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
use App\Xthiago\Guesser\RegexGuesser;
use Symfony\Component\Filesystem\Filesystem,
    App\Xthiago\Converter\GhostscriptConverterCommand,
    App\Xthiago\Converter\GhostscriptConverter;
class SettingController extends Controller
{
    public $errorFiles = [];

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
    public function uploadLanguagesIndex(Request $request)
    {
        return view('setting.uploadLanguages')->with('title','Langues Files Upload');
    }

    public function uploadLanguages(Request $request)
    {
        if($request->hasFile('englishFile')) {
        }
    }


   
}
