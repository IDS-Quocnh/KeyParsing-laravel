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

class KeywordParsingController extends Controller
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
    public function index(Request $request)
    {
        return view('keyword_parsing.index')->with('title','Key Parsing');
    }


    public function keyParsing(Request $request)
    {

        //validate the xls file
        $this->validate($request, array(
            'wordFile'      => 'required',
            'excelFile'      => 'required'
        ));
        if($request->hasFile('excelFile') && $request->hasFile('wordFile')){
            $extension = File::extension($request->excelFile->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") {
                //read excel file
                $data = Excel::load(request()->file('excelFile'), function($reader) {
                    $reader->calculate(false);
                    // Getting all results
                    $results = $reader->get();

                    // ->all() is a wrapper for ->get() and will work the same
                    $results = $reader->all();

                });
                $dataArray=$data->toArray();
                foreach($dataArray as $row){
                    if(!array_key_exists('keyword', $row) || !array_key_exists('exact_match', $row)) {
                        return view('keyword_parsing.index')->with(['title' => 'Key Parsing', 'errorMessage' => "please check file excel again, the header collumn accept are 'keyword' and 'exact_match' "]);
                    }
                    $keywordList[] = array(
                        'keyword'   => $row['keyword'],
                        'exact_match'   => $row['exact_match'],
                    );
                }

                //read word file
                $wordFile = request()->file('wordFile');
                $wordContent = $this->readWordFile($wordFile);

                $wordLines = explode("\r\n", $wordContent);

                $wordList = array();
                foreach($wordLines as $line){
                    $words = explode(" ", $line);
                    array_push($wordList, $words);
                }

                //check exits
                foreach($keywordList as $index => $excelWordItem){
                    $keyword = $excelWordItem['keyword'];

                    if("yes" == strtolower(trim($excelWordItem['exact_match']," "))){
                        $keyword = " " . $keyword . " " ;
                    }

                    if(strpos($wordContent, $keyword) > 0){
                        $keywordList[$index]['exits'] = true;
                    }else{
                        $keywordList[$index]['exits'] = false;
                    }

                    if("yes" == strtolower(trim($excelWordItem['exact_match']," "))){
                        //text exact in head of line
                        $keyword = $excelWordItem['keyword'];
                        $keyword = "\r\n" . $keyword . " " ;
                        if(strpos($wordContent, $keyword) > 0){
                            $keywordList[$index]['exits'] = true;
                        }

                        //text exact in end of line
                        $keyword = $excelWordItem['keyword'];
                        $keyword = " " . $keyword . "\r\n" ;
                        if(strpos($wordContent, $keyword) > 0){
                            $keywordList[$index]['exits'] = true;
                        }

                        //text exact in end of sentence
                        $keyword = $excelWordItem['keyword'];
                        $keyword = " " . $keyword . "." ;
                        if(strpos($wordContent, $keyword) > 0){
                            $keywordList[$index]['exits'] = true;
                        }

                        //text exact in end of file
                        $endLine = $wordLines[sizeof($wordLines)-1];
                        $keyword = $excelWordItem['keyword'];
                        $keyword = " " . $keyword ;
                        if(strpos($endLine, $keyword) > 0 && (strpos($endLine, $keyword) + strlen($keyword)) == strlen($endLine)){
                            $keywordList[$index]['exits'] = true;
                        }

                    }
                }
            }
        }
        return view('keyword_parsing.index')->with(['title' => 'Key Parsing', 'keywordList' => $keywordList]);
    }
    public function readWordFile($wordFile){
        $fileName = $wordFile->getClientOriginalName();
        $operationId = uniqid();
        $destinationPath = 'uploads/' . $operationId;
        $fileId=uniqid();
        $fileName=$wordFile->getClientOriginalName();
        $mimeType=$wordFile->getMimeType();
        $fileExt=$wordFile->getClientOriginalExtension();
        $fileType = $fileExt ;
        $fileNameC = $fileId .'-'.$fileName;
        $wordFile->move($destinationPath,$fileNameC );
        $filePath = $destinationPath .'/'.$fileNameC;
        $content=$this->extractWord($filePath);
        return $content;
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
}


