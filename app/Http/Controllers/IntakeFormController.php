<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class IntakeFormController extends Controller
{
    //
    public function payment(Request $request){
       // return response()->json(["data"=>$request->all()]);

       $provider = new PayPalClient;
       $provider->setApiCredentials($config);
    }
}
