<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;

class SearchController extends Controller
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
        $listPost = Post::orderBy('created_at', 'desc')->get();
        $matchListPost = array();
        $matchDesPost = array();
        $contentMatchListPost = array();
        $matchSubDesPost = array();
        $subMatchListPost = array();

        foreach ($listPost as $post) {
            if (strpos($post->name, $request->queryString) !== false) {
                array_push($matchListPost, $post);
                continue;
            }
            
            if (strpos($post->description, $request->queryString) !== false) {
                array_push($matchDesPost, $post);
                continue;
            }
            
            
            if (strpos($post->content, $request->queryString) !== false) {
                array_push($contentMatchListPost, $post);
                continue;
            }
            
            $words = explode(" ", $request->queryString);
            
            $flag = false;
            foreach ($words as $keyword) {
                if (strpos($post->description, $keyword) !== false) {
                    array_push($matchSubDesPost, $post);
                    $flag = true;
                    break;
                }
            }
            
            if($flag){
                continue;
            }
           
            foreach ($words as $keyword) {
                if (strpos($post->content, $keyword) !== false) {
                    array_push($subMatchListPost, $post);
                    break;
                }
            }
        }
        
        return view('Search.list')->with('queryString',$request->queryString)->with('matchListPost',$matchListPost)->with('contentMatchListPost',$contentMatchListPost)->with('subMatchListPost',$subMatchListPost)->with('matchDesPost',$matchDesPost)->with('matchSubDesPost',$matchSubDesPost );
    }
   
}
