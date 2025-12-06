<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

ROute::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/check-login', [AuthController::class, 'checkLogin'])->name('login.check');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/submit-register', [AuthController::class, 'registeration'])->name('register.submit');

    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/submit-forgot-password', [AuthController::class, 'submitForgotPassword'])->name('forgot.password.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});