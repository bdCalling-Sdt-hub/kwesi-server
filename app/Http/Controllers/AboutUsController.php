<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Validator;

class AboutUsController extends Controller
{
    //

    public function aboutusAdd(Request $request){

        
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|min:2|max:100',
            'description'=>'required|string|min:20'

      ]);

      if ($validator->fails()){
        return response()->json(["message"=>"Validation error","errors"=>$validator->errors()],400);
    }

    $result = AboutUs::create([
        'title' => $request->title,
        'description' => $request->description,

    ]);

    return response()->json([
        "data"=>"About us save successfully"
    ]);


    }

    public function aboutusGet(){
        $result=AboutUs::first();
        return response()->json([
            "data"=>$result
        ]);
    }
}
