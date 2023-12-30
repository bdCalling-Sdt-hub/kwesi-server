<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\TermAndConditionController;
use App\Http\Controllers\privacyController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\IntakeFormController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/about",[AboutController::class,'aboutAdd']);
Route::get("/about",[AboutController::class,'aboutGet']);


Route::post("/aboutus",[AboutUsController::class,'aboutusAdd']);
Route::get("/aboutus",[AboutUsController::class,'aboutusGet']);

Route::post("/term",[TermAndConditionController::class,'termAdd']);
Route::get("/term",[TermAndConditionController::class,'termGet']);

Route::post("/privacy",[privacyController::class,'privacyAdd']);
Route::get("/privacy",[privacyController::class,'privacyGet']);

Route::post("/email-send",[ContactController::class,'emailSend']);


Route::post("/intake-form",[IntakeFormController::class,'formSubmit']);
Route::post("/progress-report",[IntakeFormController::class,'existingPatient']);

