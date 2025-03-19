<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){return view('home');});

Route::get('/auth', [AuthController::class, 'loginForm']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/reg', [AuthController::class, 'regForm']);
Route::post('/reg', [AuthController::class, 'reg']);
// Route::get('/account', [AccountController::class, 'index'])->middleware('auth');  