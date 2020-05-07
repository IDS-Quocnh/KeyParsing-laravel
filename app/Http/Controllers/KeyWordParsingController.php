<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use App\DocxToTextConversion;
use DB;
use Auth;
use Session;
use Excel;
use File;

class KeyWordParsingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keyword_parsing.index')->with('title','Key Parsing');
    }

    
    public function keyParsing(Request $request)
    {
      
        $cvFiles = $request->file('cv_files');
        $weightFile = $request->file('weight_file');
        $operationId = uniqid();
        $destinationPath = 'uploads/' . $operationId;

        $path = public_path($destinationPath);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        foreach($cvFiles as $cvFile)
        {
            $this->processCVFile($cvFile, $destinationPath, $operationId);
        }
        $this->processWeight($weightFile, $destinationPath, $operationId);
        
        $cvs = DB::select("SELECT f.id, f.file_name, f.file_type, SUM(r.kn*k.keyword_weight) pt
        FROM cv_files_quick f
        INNER JOIN cv_rank_quick r ON f.id = r.fid AND f.process_id = '$operationId' AND r.process_id = '$operationId'
        INNER JOIN key_weight_quick k ON k.id = r.kid AND k.process_id = '$operationId'
        GROUP BY f.id, f.file_name, f.file_type
        ORDER BY pt DESC");
        // $cvs = DB::table('file_info')->select('id','file_name', 'file_type', 'file_size',
        // 'file_path','upd_dt')->get();

        //cleanup
        File::deleteDirectory($path);
        //DB::table('cv_files_quick')->where('process_id', '=', $operationId)->delete();
        //DB::table('cv_rank_quick')->where('process_id', '=', $operationId)->delete();
        //DB::table('key_weight_quick')->where('process_id', '=', $operationId)->delete();
        
         return view('quick_ranking.ranklist')->with(['title' => 'Rank of CVs','cvs'=>$cvs,'operationId'=>$operationId]);
    }


    public function processCVFile($file, $destinationPath, $operationId)
    {
      $fileExt=strtolower($file->getClientOriginalExtension());
      if($fileExt=='docx' OR $fileExt=='doc' OR $fileExt=='pdf')
      {
        $fileId=uniqid();        
        $fileName=$file->getClientOriginalName();
        $mimeType=$file->getMimeType();
        $fileExt=$file->getClientOriginalExtension();
        $fileType = $fileExt ; //$mimeType . ' (' . $fileExt . ')';

        $fileNameC = $fileId .'-'.$fileName;
        $file->move($destinationPath,$fileNameC );

        $filePath = $destinationPath .'/'.$fileNameC;
        if($fileExt=='pdf')
        {
          $content=$this->extractPdf($filePath);
        }
        else if($fileExt=='doc' or $fileExt=='docx')
        {
          $content=$this->extractWord($filePath);
        }
        else{
          $content='None';
        }
        if($content == "")
        {
          return;
        }

$regex = <<<'END'
/
  (
    (?: [\x00-\x7F]               # single-byte sequences   0xxxxxxx
    |   [\xC0-\xDF][\x80-\xBF]    # double-byte sequences   110xxxxx 10xxxxxx
    |   [\xE0-\xEF][\x80-\xBF]{2} # triple-byte sequences   1110xxxx 10xxxxxx * 2
    |   [\xF0-\xF7][\x80-\xBF]{3} # quadruple-byte sequence 11110xxx 10xxxxxx * 3 
    ){1,100}                      # ...one or more times
  )
| ( [\x80-\xBF] )                 # invalid byte in range 10000000 - 10111111
| ( [\xC0-\xFF] )                 # invalid byte in range 11000000 - 11111111
/x
END;
                
        $content= preg_replace($regex, '$1',  $content);
        $words = preg_replace("/[^\w\ _]+/", ' ', $content); // strip all punctuation characters, news lines, etc.
        $words = preg_split("/\s+/", $words); // split by left over spaces
        $fileToken = ';' . implode(';;',$words) . ';';


        $fields=array( 
            'process_id'=>$operationId, 
            'file_id'=>$fileId, 
            'file_name'=>$fileName, 
            'file_type'=>$fileType, 
            'file_content'=>$content, 
            'file_token'=>$fileToken, 
            'upd_by'=>Auth::user()->id, 
            'upd_dt'=>date('Y-m-d H:i:s')
          );
          
          try
        {
         
          $fileUploadId=DB::table('cv_files_quick')->insert($fields);
        }
        catch (QueryException $e)
        {
          print_r($fields);
           exit;
        }
      //  $fileUploadId=DB::table('cv_files_quick')->insert($fields);
        File::delete($filePath);
      }
    }


    public function processWeight($file, $destinationPath, $operationId)
    {
      
        $fileExt=strtolower($file->getClientOriginalExtension());

        if($fileExt=='xls' OR $fileExt=='xlsx')
        {
            $fileId=uniqid();        
            $fileName=$file->getClientOriginalName();
            $mimeType=$file->getMimeType();
            $fileExt=$file->getClientOriginalExtension();
            $fileType = $mimeType . ' (' . $fileExt . ')';

            $fileNameC = $fileId .'-'.$fileName;
            $file->move($destinationPath,$fileNameC );

            $filePath = $destinationPath .'/'.$fileNameC;
  
            if($mimeType=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            {
                $this->xlsFileImort($filePath,$operationId);
            }
            File::delete($filePath);
        }
    }
    
    public function extractPdf($filePath)
    {
      try
      {
          $parser = new \Smalot\PdfParser\Parser();
          $pdf    = $parser->parseFile($filePath);
          return $text = $pdf->getText();
      }
      catch (\Exception $e)
      {
        return "";
      }
    }
    public function extractWord($filePath)
    {
      try
      {
        $converter = new DocxToTextConversion($filePath);
        return  $converter->convertToText();
      }
      catch (\Exception $e)
      {
        return "";
      }
    }

    
    public function xlsFileImort($filePath,$operationId)
    {
      $data = Excel::load($filePath)->get();
      $dataArray=$data->toArray();
      $insert_data = [];
      foreach($dataArray as $row)
      {
        if($row['keyword'])
        {
          $words = preg_replace("/[^\w\ _]+/", ' ', $row['keyword']); // strip all punctuation characters, news lines, etc.
          $words = preg_split("/\s+/", $words); // split by left over spaces
          $fileToken = ';' . implode(';;',$words) . ';';
          $insert_data[] = array(
              'process_id'=>$operationId, 
              'keyword_text'   => $row['keyword'],
              'keyword_weight'   => $row['weight'],
              'match_flag'    => $row['exact_match'],
              'keyword_token'    => $fileToken,
            );
        }
      }

      if(!empty($insert_data))
      {
        DB::table('key_weight_quick')->insert($insert_data);
        $sSql = "INSERT INTO cv_rank_quick (process_id,fid,kid, kn)
        SELECT '$operationId',fid,kid, (diffLn/keyLn) kn FROM 
        (SELECT a.id fid, b.id kid
        , CASE WHEN b.match_flag IS NULL THEN LENGTH(b.keyword_text) ELSE LENGTH(b.keyword_token) END keyLn
        , CASE WHEN b.match_flag IS NULL THEN LENGTH(a.file_content) - 
        LENGTH(REPLACE(a.file_content,b.keyword_text,'')) 
        ELSE LENGTH(a.file_token) - LENGTH(REPLACE(a.file_token,b.keyword_token,''))  END diffLn
        FROM cv_files_quick a INNER JOIN key_weight_quick b ON a.process_id = b.process_id 
        AND a.process_id = '$operationId' ) t ";
        
        DB::insert($sSql);
      }
    }

    
    public function PointDetail(Request $request)
    {

      $cvs = DB::select("SELECT f.id, f.file_name,  SUM(r.kn*k.keyword_weight) pt
      FROM cv_files_quick f
      INNER JOIN cv_rank_quick r ON f.id = r.fid AND f.id= '$request->fid'
      AND  f.process_id = '$request->operationId' AND  r.process_id = '$request->operationId'
      INNER JOIN key_weight_quick k ON k.id = r.kid AND k.process_id = '$request->operationId'
      GROUP BY f.id, f.file_name
      ORDER BY pt DESC");

        
        
        $pts = DB::select("SELECT r.id,k.keyword_text keyw, 
        CASE WHEN k.match_flag IS NULL THEN 'String Match' ELSE 'Exact Match' END mt,
        k.keyword_weight wgt, r.kn, (r.kn*k.keyword_weight) pt
               FROM `cv_rank_quick` r 
               INNER JOIN `key_weight_quick` k ON k.id = r.kid
               AND r.fid = $request->fid AND  r.process_id = '$request->operationId'
               AND k.process_id = '$request->operationId'");
        
        
        return view('point_detail',['title' => 'Point Details','cvs'=>$cvs,'pts'=>$pts]);
       
       // return view('meta_upload')->with('title','Upload Weights');
    }

   
}
