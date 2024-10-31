<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
});

//login route
Route::get('login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('home');
});

