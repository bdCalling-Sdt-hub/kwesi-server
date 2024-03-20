<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\IntakeForm;
use App\Models\ProgressReport;
use Illuminate\Support\Facades\Mail;
use App\Mail\IntakeFormMail;
use App\Mail\ProgressReportMail;
use Carbon\Carbon;

class IntakeFormController extends Controller
{
    //|unique:intake_forms

    public function formSubmit(Request $request){
       //return response()->json(["data"=>$request->all()]);
        $validator = Validator::make($request->all(),[
        'name' => 'required|string|min:2|max:100',
        'dateOfBirth'=>'required| date',
        "address"=>'required|string|min:2|max:200',
        "phoneNumber"=>'required|string',
        'email'=>'required|string|email',
        "contactBy"=>'required|string',
        "mailAddWithUser"=>'required|string',
        "occupation"=>'required|string',
        "reasonOfVisit"=>'required|string',
        "allergies"=>'required|string',
        "presentMedication"=>'required|string',
        "prefarableTime"=>'required|string'

   ]);

    if ($validator->fails()){
      return response()->json(["message"=>"Validation error","errors"=>$validator->errors()],400);
    }
    $existingUser = IntakeForm::where('email', $request->email)->latest()->first();

    $currentTime = Carbon::now();


    if(!$existingUser){
        $mailData=[
            'name'=>$request->name,
            'dateOfBirth'=>$request->dateOfBirth,
            'address'=>$request->address,
            'phoneNumber'=>$request->phoneNumber,
            'email'=>$request->email,
            'contactBy'=>$request->contactBy,
            'mailAddWithUser'=>$request->mailAddWithUser,
            'occupation'=>$request->occupation,
            'reasonOfVisit'=>$request->reasonOfVisit,
            'allergies'=>$request->allergies,
            'presentMedication'=>$request->presentMedication,
            'prefarableTime'=>$request->prefarableTime
          ];

        Mail::to("freelancerrtushar@gmail.com")->send(new IntakeFormMail($mailData));

        $result=IntakeForm::create([
        'name'=>$request->name,
        'dateOfBirth'=>$request->dateOfBirth,
        'address'=>$request->address,
        'phoneNumber'=>$request->phoneNumber,
        'email'=>$request->email,
        'contactBy'=>$request->contactBy,
        'mailAddWithUser'=>$request->mailAddWithUser,
        'occupation'=>$request->occupation,
        'reasonOfVisit'=>$request->reasonOfVisit,
        'allergies'=>$request->allergies,
        'presentMedication'=>$request->presentMedication,
        'prefarableTime'=>$request->prefarableTime

    ]);

      return response()->json(["message"=>"Your Form submitted successfully"],200);
    }
    if($existingUser && isset($existingUser->created_at)){

        $userCreatedAt = Carbon::parse($existingUser->created_at);
        $differenceInMonths = $currentTime->diffInMonths($userCreatedAt);


        if ($differenceInMonths >= 3) {
            // Perform actions for time greater than or equal to 3 months

        $mailData=[
            'name'=>$request->name,
            'dateOfBirth'=>$request->dateOfBirth,
            'address'=>$request->address,
            'phoneNumber'=>$request->phoneNumber,
            'email'=>$request->email,
            'contactBy'=>$request->contactBy,
            'mailAddWithUser'=>$request->mailAddWithUser,
            'occupation'=>$request->occupation,
            'reasonOfVisit'=>$request->reasonOfVisit,
            'allergies'=>$request->allergies,
            'presentMedication'=>$request->presentMedication,
            'prefarableTime'=>$request->prefarableTime
          ];

        Mail::to("freelancerrtushar@gmail.com")->send(new IntakeFormMail($mailData));

        $result=IntakeForm::create([
        'name'=>$request->name,
        'dateOfBirth'=>$request->dateOfBirth,
        'address'=>$request->address,
        'phoneNumber'=>$request->phoneNumber,
        'email'=>$request->email,
        'contactBy'=>$request->contactBy,
        'mailAddWithUser'=>$request->mailAddWithUser,
        'occupation'=>$request->occupation,
        'reasonOfVisit'=>$request->reasonOfVisit,
        'allergies'=>$request->allergies,
        'presentMedication'=>$request->presentMedication,
        'prefarableTime'=>$request->prefarableTime

    ]);

      return response()->json(["message"=>"Your Form submitted successfully"],200);
        } else {
            // Handle the case where the time is less than 3 months
            return response()->json([
                "message"=>"You are existing patient.please go existing patient page and submit your progress report.Thank you."
               ],412);
        }

    }

   return response()->json([
    "message"=>"You are existing patient.please go existing patient page and submit your progress report.Thank you."
   ],412);

 }



 public function existingPatient(Request $request){

    $validator = Validator::make($request->all(),[
        'name' => 'required|string|min:2|max:100',
        'email'=>'required|string|email|min:10',
        "changePharmecyInformation"=>'required|string|min:2|max:50',
        "startWeight"=>'required|string',
        'currentWeight'=>'required|string',
        "goalWeight"=>'required|string',
        "bloodPressure"=>'required|string',
        "otherPrescribedMedication"=>'required|string',
        "refill"=>'required|string',
        "symptomsWithWeightLossMedication"=>'required|string',
        "enterThePharmacyName"=>'required|string',
        "prefarableTime"=>'required|string',
        "knowledge"=>'required|string'
   ]);

    if ($validator->fails()){
      return response()->json(["message"=>"Validation error","errors"=>$validator->errors()],400);
    }

    $userExists=IntakeForm::where("email",$request->email)->latest()->first();
    $emailExists=IntakeForm::where("email",$request->email)->latest()->exists();
    // return response()->json([
    //     "message"=> $userExists
    // ],200);
    $currentTime = Carbon::now();
    if($emailExists && isset($userExists->created_at)){

        $userCreatedAt = Carbon::parse($userExists->created_at);
        $differenceInMonths = $currentTime->diffInMonths($userCreatedAt);


        if ($differenceInMonths < 3) {
            $mailData=[
                'name' => $request->name,
                'email'=>$request->email,
                "changePharmecyInformation"=>$request->changePharmecyInformation,
                "startWeight"=>$request->startWeight,
                'currentWeight'=>$request->currentWeight,
                "goalWeight"=>$request->goalWeight,
                "bloodPressure"=>$request->bloodPressure,
                "otherPrescribedMedication"=>$request->otherPrescribedMedication,
                "refill"=>$request->refill,
                "symptomsWithWeightLossMedication"=>$request->symptomsWithWeightLossMedication,
                "enterThePharmacyName"=>$request->enterThePharmacyName,
                "prefarableTime"=>$request->prefarableTime,
                "knowledge"=>$request->knowledge

              ];

            Mail::to("freelancerrtushar@gmail.com")->send(new ProgressReportMail($mailData));

            $result=ProgressReport::create([
                'name' => $request->name,
                'email'=>$request->email,
                "changePharmecyInformation"=>$request->changePharmecyInformation,
                "startWeight"=>$request->startWeight,
                'currentWeight'=>$request->currentWeight,
                "goalWeight"=>$request->goalWeight,
                "bloodPressure"=>$request->bloodPressure,
                "otherPrescribedMedication"=>$request->otherPrescribedMedication,
                "refill"=>$request->refill,
                "symptomsWithWeightLossMedication"=>$request->symptomsWithWeightLossMedication,
                "enterThePharmacyName"=>$request->enterThePharmacyName,
                "prefarableTime"=>$request->prefarableTime,
                "knowledge"=>$request->knowledge

            ]);

            return response()->json([
                "message"=>"Your Progress report send successfully"
            ],200);
        }else{
            return response()->json([
                "message"=>"Your progress report submit time is over.so you have to Form submit again as a New patient."
            ]);
        }



    }else{

      return response()->json([
            "message"=>"You are not existing patient."
        ],412);
    }


 }




}
