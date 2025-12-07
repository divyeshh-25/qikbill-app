<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

Route::get('/', function () {
    return view('super_admin.dashboard');
})->name('super_admin.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('categories',CategoryController::class);
    Route::get('/subcatgories',[CategoryController::class,'subcategory'])->name('categories.subcatgories');
});
