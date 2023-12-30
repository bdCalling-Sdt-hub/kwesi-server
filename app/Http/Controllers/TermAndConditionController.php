<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use Illuminate\Support\Facades\Validator;

class TermAndConditionController extends Controller
{
    //
    public function termAdd(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required|string|min:2|max:100',
            'description'=>'required|string|min:20'

      ]);

      if ($validator->fails()){
        return response()->json(["message"=>"Validation error","errors"=>$validator->errors()],400);
    }

    $result = Term::create([
        'title' => $request->title,
        'description' => $request->description,

    ]);

    return response()->json([
        "data"=>"Term and condition save successfully"
    ]);


    }

    public function termGet(){
        $result=Term::first();
        return response()->json([
            "data"=>$result
        ]);
    }

}
