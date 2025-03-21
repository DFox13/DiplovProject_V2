<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DentistsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){return view('home');});
Route::get('/about', function(){return view('about');});
Route::get('/contacts', function(){return view('contacts');});

Route::resource('dentists' , DentistsController::class);

Route::get('/reviews', function(){return view('review');});
Route::get('/services', function(){return view('service');});
Route::get('/stock', function(){return view('stock');});

Route::get('/auth', [AuthController::class, 'loginForm']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/reg', [AuthController::class, 'regForm']);
Route::post('/reg', [AuthController::class, 'reg']);

Route::get('/account', [AccountController::class, 'index'])->middleware('auth');  