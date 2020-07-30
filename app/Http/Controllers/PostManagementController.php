<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use DB;
use Auth;
use Session;
use File;
use App\Model\Post;
use App\Model\Catagory;

class PostManagementController extends Controller
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
    
    public function getList(){
        $list = Post::query()
        ->join('catagory', 'post.catagory_id', "=", "catagory.id")
        ->join('menu', 'catagory.menu_id', "=", "menu.id")
        ->orderBy('post.created_at', 'desc')
        ->get(['post.id as id', 'post.name as name' , 'post.description' , 'catagory.name as catagory_name', 'menu.name as menu_name']);
        return $list;
    }
    
    public function index(Request $request)
    {
        $list = $this->getList();
        return view('PostManagement.list')->with('list', $list);
    }
    
    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = Post::find($request->id);
            if ($request->name == $item->name) {
                $keyUnikey = "required|min:3|max:256";
            } else {
                $keyUnikey = "required|unique:post|min:3|max:256";
            }
            $request->validate([
                'name' => $keyUnikey,
            ]);
            
            $item = Post::find($request->id);
            $name = $item->name;
            $item->setAttributeMap($request->all());
            $item->save();
            $list = $this->getList();
            return view('PostManagement.list')->with('susscessMessage', 'Post name "' . $name . '" edit successfully')
            ->with('list', $list);
        } else {
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $item = Post::query()
            ->join('catagory', 'post.catagory_id', "=", "catagory.id")
            ->join('menu', 'catagory.menu_id', "=", "menu.id")
            ->where('post.id', '=' , $request->id)
            ->get(['post.id as id', 'post.name as name' , 'post.description', 'post.content' , 'post.catagory_id as catagory_id', 'menu.id as menu_id', 'catagory.name as catagory_name', 'menu.name as menu_name'])
            ->first();
            return view('PostManagement.main')->with('item', $item)->with('popupMode', $request->popupMode);
        }
    }
    
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:post|min:3',
            ]);
            
            $item = new Post;
            $item->setAttributeMap($request->all());
            $item->save();
            return view('PostManagement.main')->with('susscessMessage', 'Add Post successfully');
        } else {
            $catagory = Catagory::find($request->catagory_id);
            $menu_id = $catagory->menu_id;
            return view('PostManagement.main')->with('catagory_id', $request->catagory_id)->with('menu_id', $menu_id)->with('popupMode', $request->popupMode);
        }
    }
    
    public function delete(Request $request)
    {
        $item = Post::find($request->id);
        $name = $item->name;
        $item->delete();
        $list = $this->getList();
        return view('PostManagement.list')->with('susscessMessage', 'Post name "' . $name . '" deleted successfully')->with('list', $list);
    } 
    
    public function show(Request $request)
    {
        $item = Post::find($request->id);
        $itemCatagory = Catagory::find($item->catagory_id);
        return view('PostManagement.show')->with('item', $item)->with('itemCatagory', $itemCatagory);
    }

}
