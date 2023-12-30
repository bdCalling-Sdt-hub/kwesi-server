<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;
use Illuminate\Support\Facades\Validator;

class PrivacyController extends Controller
{

    public function privacyAdd(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required|string|min:2|max:100',
            'description'=>'required|string|min:20'

      ]);

      if ($validator->fails()){
        return response()->json(["message"=>"Validation error","errors"=>$validator->errors()],400);
    }

    $result = Privacy::create([
        'title' => $request->title,
        'description' => $request->description,

    ]);

    return response()->json([
        "data"=>"Privacy policy save successfully"
    ]);


    }

    public function privacyGet(){
        $result=Privacy::first();
        return response()->json([
            "data"=>$result
        ]);
    }
}
