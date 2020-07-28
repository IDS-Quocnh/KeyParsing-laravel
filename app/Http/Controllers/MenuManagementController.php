<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use DB;
use Auth;
use Session;
use File;
use App\Model\Menu;

class MenuManagementController extends Controller
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

    public function index(Request $request)
    {
        $list = Menu::orderBy('created_at', 'desc')->get();
        return view('MenuManagement.list')->with('list', $list);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $item = Menu::find($request->id);
            if ($request->name == $item->name) {
                $keyUnikey = "required|min:3";
            } else {
                $keyUnikey = "required|unique:menu|min:3|max256";
            }
            $request->validate([
                'name' => $keyUnikey,
            ]);

            $item = Menu::find($request->id);
            $name = $item->name;
            $item->setAttributeMap($request->all());
            $item->save();
            $list = Menu::orderBy('created_at', 'desc')->get();
            foreach ($list as $item){
                $item->short_message = substr($item->message,0,150);
            }
            return view('MenuController.list')->with('susscessMessage', 'Popup Message name "' . $name . '" edit successfully')
                ->with('list', $list);
        } else {
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $item = Menu::find($request->id);
            return view('MenuManagement.main')->with('item', $item);
        }
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:menu|min:3',
            ]);

            $item = new Menu;
            $item->setAttributeMap($request->all());
            $item->save();
            return view('MenuManagement.main')->with('susscessMessage', 'Add menu successfully');
        } else {
            return view('MenuManagement.main');
        }
    }

    public function delete(Request $request)
    {
//         $item = Menu::find($request->id);
//         $name = $item->name;
//         $item->delete();
//         $list = Menu::orderBy('created_at', 'desc')->get();
//         return view('MenuController.list')->with('susscessMessage', 'Popup Message name "' . $name . '" deleted successfully')->with('list', $list);
    } 

}