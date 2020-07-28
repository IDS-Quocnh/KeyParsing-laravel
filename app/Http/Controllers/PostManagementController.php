<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use DB;
use Auth;
use Session;
use File;
use App\Menu;

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

    public function index(Request $request)
    {
        $list = Menu::orderBy('created_at', 'desc')->get();
        if (isset($request->addPopupMessage)) {
            return view('PopupMessageController.list')->with('susscessMessage', 'Menu registered successfully')->with('list', $list);
        }
        return view('PopupMessageController.list')->with('list', $list);
    }

    public function edit(Request $request)
    {
//         if ($request->isMethod('post')) {
//             $item = PopupMessage::find($request->id);
//             if ($request->name == $item->name) {
//                 $keyUnikey = "required|min:3";
//             } else {
//                 $keyUnikey = "required|unique:popup_message|min:3|max256";
//             }
//             $request->validate([
//                 'name' => $keyUnikey,
//             ]);

//             $item = PopupMessage::find($request->id);
//             $name = $item->name;
//             $item->setAttributeMap($request->all());
//             $item->save();
//             $list = PopupMessage::orderBy('created_at', 'desc')->get();
//             foreach ($list as $item){
//                 $item->short_message = substr($item->message,0,150);
//             }
//             return view('PopupMessageController.list')->with('susscessMessage', 'Popup Message name "' . $name . '" edit successfully')
//                 ->with('list', $list);
//         } else {
//             if (!isset($request->id)) {
//                 return redirect()->route('home');
//             }
//             $item = PopupMessage::find($request->id);
//             return view('PopupMessageController.main')->with('item', $item);
//         }
    }

    public function add(Request $request)
    {
//         if ($request->isMethod('post')) {
//             $request->validate([
//                 'name' => 'required|unique:popup_message|min:3',
//             ]);

//             $item = new PopupMessage;
//             $item->setAttributeMap($request->all());
//             $item->save();
//             return view('PopupMessageController.main')->with('susscessMessage', 'Add Popup Message successfully');
//         } else {
//             return view('PopupMessageController.main');
//         }
    }

    public function delete(Request $request)
    {
//         $item = PopupMessage::find($request->id);
//         $name = $item->name;
//         $item->delete();
//         $list = PopupMessage::orderBy('created_at', 'desc')->get();
//         return view('PopupMessageController.list')->with('susscessMessage', 'Popup Message name "' . $name . '" deleted successfully')->with('list', $list);
    } 

}
