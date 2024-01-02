<?php

use Illuminate\Support\Facades\Route;
use App\Models\Privacy;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy-policy',function(){
    $result=Privacy::first();
   
    return view('privacy.privacy',compact('result'));
});
