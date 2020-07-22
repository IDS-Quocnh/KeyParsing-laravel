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
use App\User;
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
        if ($request->hasFile('englishFile')) {
            $englishFile = $request->file('englishFile');
            $fileName = $englishFile->getClientOriginalName();
            $request->englishFile->move(resource_path('/lang'), "en.json");
        }

        if ($request->hasFile('italianFile')) {
            $italianFile = $request->file('italianFile');
            $fileName = $italianFile->getClientOriginalName();
            $request->italianFile->move(resource_path('/lang'), "it.json");
        }
        return redirect()->back();
    }

    public function changeLanguage(Request $request){
        $lang = $request->language;
        $language = config('app.locale');
        
        if ($lang == 'en') {
            $language = 'en';
            if (auth()->user()) {
                $user = User::find(auth()->user()->id);
                $user->default_language = "English";
                $user->save();
            }
        }
        if ($lang == 'it') {
            $language = 'it';
            if (auth()->user()) {
                $user = User::find(auth()->user()->id);
                $user->default_language = "Italian";
                $user->save();
            }
        }
        
        Session::put('language', $language);
        return redirect()->back();
    }
    
    public function downloadLanguage()
    {
        $zip_file = 'langues.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        
        $path = resource_path('/lang');
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file) {
            if (! $file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = 'lang/' . substr($filePath, strlen($path));
                $zip->addFile($filePath, $relativePath);
            }
            
        }
        $zip->close();
        return response()->download($zip_file);
    }   
   
}
