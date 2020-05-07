<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use App\Imports\KeywordCountOptionImport;
use App\KeyWordCountOption;
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

        //validate the xls file
        $this->validate($request, array(
            'excelFile'      => 'required'
        ));
        if($request->hasFile('excelFile')){
            $extension = File::extension($request->excelFile->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") {
                $data = Excel::Import(new KeywordCountOptionImport, request()->file('excelFile'));
                $keywordMap = KeyWordCountOption::all();
                KeyWordCountOption::truncate();
                dd($keywordMap[0]->exactMatch);
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'Keyword' => $value->keyword,
                            'Exact_Match' => $value->exactMatch
                        ];
                    }

                    dd("ssdds");

                    if(!empty($insert)){

                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }

        return view('keyword_parsing.index')->with('title','Key Parsing');
    }

}
