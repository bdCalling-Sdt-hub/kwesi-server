<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class IntakeFormController extends Controller
{
    //
    public function formSubmit(Request $request){
       //return response()->json(["data"=>$request->all()]);

       $provider = new PayPalClient;
       $provider->setApiCredentials(config('paypal'));
       $paypalToken=$provider->getAccessToken();

       $response = $provider->createOrder([
        "intent" => "CAPTURE",
        "application_context"=>[
            "return_url"=>"http://192.168.10.13:8000/api/payment/success",
            "cancel_url"=>"http://192.168.10.13:8000/api/payment/cancel"
        ],
        "purchase_units"=>[
            [
                "amount"=>[
                    "currency_code"=> "USD",
                    "value"=> (int) $request->price 
                ]
            ]
         ]
       ]);

       return $response;

       if(isset($response['id']) && $response['id']!=null){

        foreach($response['links'] as $link){
            if($link['rel']==='approve'){
                return response.json([
                    "link"=>$link['href']
                ]);
                //redirect()->away($link['href']);
            }
        }

       }else{
         return response()->json([
             "message"=>"payment canceled"
         ]);
       }

      
    }

    public function paymentSuccess(Request $request){

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();

        $response=$provider->capturePaymentOrder($request['token']);

        if(isset($response['status']) && $response['status']=='COMPLETED'){
            return response()->json([
                "message"=>"Transection complete"
            ]);
        }else{
            return response()->json([
                "message"=>$response['message'] ?? "Something went wrong"
            ]);
        }
        
    }

    public function paymentCancel(){
        return response()->json([
            "message"=>"You have cancelled the transaction"
        ]);
    }
}
