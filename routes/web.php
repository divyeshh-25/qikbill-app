<?php

use Illuminate\Support\Facades\Route;

include_once __DIR__ . '/admin/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});