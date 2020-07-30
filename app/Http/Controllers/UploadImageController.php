<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class UploadImageController extends Controller
{
 


    public function index(Request $request)
    {

        return view('upload_image.index');
    }

    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            $operationId =  uniqid();
            $destinationPath = 'uploads';
            $file = $request->file('fileUpload');
            $fileExt=strtolower($file->getClientOriginalExtension());
            $fileId=uniqid();
            $fileName=$file->getClientOriginalName();
			$parts = explode('.', $fileName);
			$fileName= uniqid();
			$extent = $parts[count($parts) - 1];
            $mimeType=$file->getMimeType();
            $fileExt=$file->getClientOriginalExtension();
            $fileType = $mimeType . ' (' . $fileExt . ')';
            $file->move($destinationPath . "/" . $fileId ,$fileName . "." . $extent);
            $filePath = $destinationPath . "/" . $fileId  .'/'.$fileName . "." . $extent;
            return view("upload_image.upload")->with("filePath", $filePath);
        }else{
            return view('upload_image.index');
        }
    }


}
