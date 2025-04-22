<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/student-test', function () {
    return "Student route is working!";
});


Route::get('/test', [TestController::class, 'hello']);
Route::post('/user/submit', [TestController::class, 'submitForm']);




Route::get('/student/login', [LoginController::class, 'hello']);


