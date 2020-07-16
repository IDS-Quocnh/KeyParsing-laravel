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

class CVRankingController extends Controller
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
        
        // DB::table('cv_rank')->truncate();
        // DB::table('key_weight')->truncate();
        return view('ranking.index')->with('title','CV Ranking');
    }

    
    public function rankCV(Request $request)
    {
        $weightFile = $request->file('weight_file');
        $operationId =  uniqid();
        $destinationPath = 'uploads';


        $this->processWeight($weightFile, $destinationPath, $operationId);
        
        $cvs = DB::select("SELECT f.id, f.file_name,  SUM(r.kn*k.keyword_weight) pt
        FROM cv_files f
        INNER JOIN cv_rank r ON f.id = r.fid AND  r.process_id = '$operationId'
        INNER JOIN key_weight k ON k.id = r.kid AND k.process_id = '$operationId'
        GROUP BY f.id, f.file_name
        ORDER BY pt DESC");
        // $cvs = DB::table('file_info')->select('id','file_name', 'file_type', 'file_size',
        // 'file_path','upd_dt')->get();

        //cleanup
      //  DB::table('cv_rank')->where('process_id', '=', $operationId)->delete();
      //  DB::table('key_weight')->where('process_id', '=', $operationId)->delete();
        return view('ranking.ranklist')->with(['title' => 'Rank of CVs','cvs'=>$cvs,'operationId'=>$operationId]);
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
    
    
    public function xlsFileImort($filePath,$operationId)
    {
      $data = Excel::load($filePath, function($reader) {
          $reader->calculate(false);
          // Getting all results
          $results = $reader->get();

          // ->all() is a wrapper for ->get() and will work the same
          $results = $reader->all();

      });
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
        DB::table('key_weight')->insert($insert_data);
        $sSql = "INSERT INTO cv_rank (process_id,fid,kid, kn)
        SELECT '$operationId',fid,kid, (diffLn/keyLn) kn FROM 
        (SELECT a.id fid, b.id kid
        , CASE WHEN b.match_flag IS NULL THEN LENGTH(b.keyword_text) ELSE LENGTH(b.keyword_token) END keyLn
        , CASE WHEN b.match_flag IS NULL THEN LENGTH(a.file_content) - 
        LENGTH(REPLACE(a.file_content,b.keyword_text,'')) 
        ELSE LENGTH(a.file_token) - LENGTH(REPLACE(a.file_token,b.keyword_token,''))  END diffLn
        FROM cv_files a INNER JOIN key_weight b ON  b.process_id  = '$operationId' ) t 
        ";
        
        DB::insert($sSql);
      }
    }

    public function PointDetail(Request $request)
    {

      $cvs = DB::select("SELECT f.id, f.file_name,  SUM(r.kn*k.keyword_weight) pt
      FROM cv_files f
      INNER JOIN cv_rank r ON f.id = r.fid AND f.id= '$request->fid' AND  r.process_id = '$request->operationId'
      INNER JOIN key_weight k ON k.id = r.kid AND k.process_id = '$request->operationId'
      GROUP BY f.id, f.file_name
      ORDER BY pt DESC");

        
        
        $pts = DB::select("SELECT r.id,k.keyword_text keyw, 
        CASE WHEN k.match_flag IS NULL THEN 'String Match' ELSE 'Exact Match' END mt,
        k.keyword_weight wgt, r.kn, (r.kn*k.keyword_weight) pt
               FROM `cv_rank` r 
               INNER JOIN `key_weight` k ON k.id = r.kid
               AND r.fid = $request->fid AND  r.process_id = '$request->operationId'
               AND k.process_id = '$request->operationId'");
        
        
        return view('point_detail',['title' => 'Point Details','cvs'=>$cvs,'pts'=>$pts]);
       
       // return view('meta_upload')->with('title','Upload Weights');
    }

   
}
