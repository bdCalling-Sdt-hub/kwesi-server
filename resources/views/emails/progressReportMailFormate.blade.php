<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progress report</title>
</head>
<body>


    <div class="" style="background: rgb(241, 127, 127);padding:30px;width:700px">
        <h1>Email from: {{$mailData["email"]}}</h1>
        <h1>Patient name: {{$mailData["name"]}}</h1>
        <h1>Change in pharmacy information: {{$mailData["changePharmecyInformation"]}}</h1>
        <h1>Start weight: {{$mailData["startWeight"]}}</h1>
        <h1>Current weight: {{$mailData["currentWeight"]}}</h1>
        <h1>Goal weight: {{$mailData["goalWeight"]}}</h1>
        <h1>BloodPressure: {{$mailData["bloodPressure"]}}</h1>
        <h1>Other Prescribed Medication: {{$mailData["otherPrescribedMedication"]}}</h1>
        <h1>Want refill for medication: {{$mailData["refill"]}}</h1>
        <h1>Symptoms With Weight Loss Medication: {{$mailData["symptomsWithWeightLossMedication"]}}</h1>
        <h1>Enter The Pharmacy Name: {{$mailData["enterThePharmacyName"]}}</h1>
        <h1>PrefarableTime: {{$mailData["prefarableTime"]}}</h1>
        <h1>This information is current and true to the best of my knowledge : {{$mailData["knowledge"]}}</h1>


   </div>

</body>
</html>
