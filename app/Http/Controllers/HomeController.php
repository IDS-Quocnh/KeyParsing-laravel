<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use ZipArchive;

class HomeController extends Controller
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

        // $zip = new ZipArchive;
        // if ($zip->open('uploads/a.zip') === TRUE) {
        //     $zip->extractTo('uploads/my/');
        //     $zip->close();
        //     echo 'ok';
        // } else {
        //     echo 'failed';
        // }

        // exit ;
          return view('home')->with('title','Dashboard');
    }
   
}
