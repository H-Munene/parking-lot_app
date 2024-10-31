<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Route::post('login', [AuthController::class, 'login'])->name('login');
// Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('home');
});

