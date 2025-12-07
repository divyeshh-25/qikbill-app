<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

include_once __DIR__ . '/admin/auth.php';



Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories',CategoryController::class);
    Route::get('/subcatgories',[CategoryController::class,'subcategory'])->name('categories.subcatgories');
});

