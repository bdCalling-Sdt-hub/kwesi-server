<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intake form mail</title>
</head>
<body>

    <div class="" style="background: gray;padding:20px;width:700px">
        <h1>Email from: {{$mailData["email"]}}</h1>
        <h1>Patient name: {{$mailData["name"]}}</h1>
        <h2>Date of birth: {{$mailData["dateOfBirth"]}}</h2>
        <h2>PhoneNumber: {{$mailData["phoneNumber"]}}</h2>
        <h2>ContactBy : {{$mailData["contactBy"]}}</h2>
        <h2>Would you like to add our mailing list : {{$mailData["mailAddWithUser"]}}</h2>
        <h2>Occupation : {{$mailData["occupation"]}}</h2>
        <h2>Reason Of Visit : {{$mailData["reasonOfVisit"]}}</h2>
        <h2>Allergies : {{$mailData["allergies"]}}</h2>
        <h2>PresentMedication : {{$mailData["presentMedication"]}}</h2>
        <h2>PrefarableTime: {{$mailData["prefarableTime"]}}</h2>

   </div>

</body>
</html>
