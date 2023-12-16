<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    //

    public function aboutAdd(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required|string|min:2|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'description'=>'required|string|min:20|max:1000'

      ]);

        if ($validator->fails()){
            return response()->json(["errors"=>$validator->errors()],400);
        }

        if ($request->file('image')) {
            $file = $request->file('image');
//return($file);

            $timeStamp = time(); // Current timestamp
            $fileName = $timeStamp . '.' . $file->getClientOriginalExtension();
            $file->storeAs('image', $fileName, 'public');

            $filePath = '/storage/image/' . $fileName;
            $fileUrl = $filePath;

            $result = About::create([
                'title' => $request->title,
                'image'=>$fileUrl,
                'description' => $request->description,

            ]);

            return response()->json([
                "data"=>"About save successfully"
            ]);

        }
}


public function aboutGet(){
    $result=About::first();
    return response()->json([
        "data"=>$result
    ]);
}
}
