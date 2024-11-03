<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::view("/", "home")->name('home');
});


