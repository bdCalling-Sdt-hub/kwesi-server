<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
class ContactController extends Controller
{
    //
    public function emailSend(Request $request){

        //return $request->all();
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:2|max:100',
            'email'=>'required|string|email|min:5',
            "subject"=>'required|string|min:2|max:100',
            "message"=>'required|string|min:5'


      ]);

      if ($validator->fails()){
        return response()->json(["message"=>"Validation error","errors"=>$validator->errors()],400);
       }

       $email=env("MAIL_FROM_ADDRESS");
       $mailData=[
        "name"=>$request->name,
        "email"=>$request->email,
        "subject"=>$request->subject,
        "message"=>$request->message

       ];

       Mail::to("freelancerrtushar@gmail.com")->send(new ContactMail($mailData));

       //dd("Email send successfully");
       return response()->json(["data"=>"Email sent successfully"]);

    }
}
