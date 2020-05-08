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

class CVCollectionController extends Controller
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

    var $error_message=[] ;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = DB::table('cv_files')->select('id','file_name','file_path','upd_dt')->get();
        return view('cv_collection.index')->with(['title' => 'CV List','cvs'=>$cvs]);
    }


    public function cvFormRaw(Request $request)
    {
      return view('cv_collection.cv_raw')->with(['title' => 'CV Upload (.doc, .docx, .pdf)']);
    }

    public function deleteCV(Request $request)
    {     
      $cv = DB::table('cv_files')->find($request->fid);
      File::delete(public_path().'/'.$cv->file_path);
      DB::table('cv_files')->where('id', '=', $request->fid)->delete();
      return back();
    }

    public function clearCV(Request $request)
    {     
      $cv = DB::table('cv_files')->truncate();
      $cv = DB::table('cv_rank')->truncate();
      $cv = DB::table('key_weight')->truncate();
      File::deleteDirectory(public_path().'/uploads/zzzzzzzzzzzzz');
      return back();
    }
    
    public function cvUploadRaw(Request $request)
    {
      
        $cvFiles = $request->file('cv_files');
        $weightFile = $request->file('weight_file');
        $operationId = 'zzzzzzzzzzzzz';
        $destinationPath = 'uploads/' . $operationId;

        $path = public_path($destinationPath);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        foreach($cvFiles as $cvFile)
        {
            $this->processCVFile($cvFile, $destinationPath, $operationId);
        }
        if(count($this->error_message)==0)
        {
          return back()->with('success', 'File Upload Successful');
        }
        elseif(count($this->error_message)==count($cvFiles))
        {
          return back()->with('upload-error', $this->error_message);
        }
        else{
          return back()->with('upload-warning', $this->error_message);
        }
        
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
        $fileType =  $fileExt; //$mimeType . ' (' . $fileExt . ')';

        $fileNameC = $fileId .'-'.$fileName;
        $file->move($destinationPath,$fileNameC );

        $filePath = $destinationPath .'/'.$fileNameC;
        if($fileExt=='pdf')
        {
          $content=$this->extractPdf($filePath,$fileName);
        }
        else if($fileExt=='doc' or $fileExt=='docx')
        {
          $content=$this->extractWord($filePath,$fileName);
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
            'file_id'=>$fileId, 
            'file_name'=>$fileName, 
            'file_path'=>$filePath, 
            'file_content'=>$content, 
            'file_token'=>$fileToken, 
            'upd_by'=>Auth::user()->id, 
            'upd_dt'=>date('Y-m-d H:i:s')
          );
          
        //$fileUploadId=DB::table('cv_files')->insert($fields);
        try
        {
         
          $fileUploadId=DB::table('cv_files')->insert($fields);
        }
        catch (Exception $e)
        {
          
           exit;
        }
      }
    }
    
    public function extractPdf($filePath,$fileName)
    {
     
      try
      {
          $parser = new \Smalot\PdfParser\Parser();
          $pdf    = $parser->parseFile($filePath);
          return $text = $pdf->getText();
      }
      catch (\Exception $e )
      {
        $this->error_message[] = $fileName .' :: ' . $e->getMessage();
        return "";
      }
    }
    public function extractWord($filePath,$fileName)
    {
      try
      {
        $converter = new DocxToTextConversion($filePath);
        return  $converter->convertToText();
      }
      catch (\Exception $e)
      {
        $this->error_message[] = $fileName .' :: ' . $e->getMessage();
        return "";
      }
    }
   
}
