<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});


