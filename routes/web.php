<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

include_once __DIR__ . '/admin/auth.php';



Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('/subcatgories', [CategoryController::class, 'subcategory'])->name('categories.subcatgories');
    Route::group(
        [
            'prefix' => 'settings',
            'as' => 'setting.'
        ],
        function () {
            Route::get('company-setting',[CompanySettingController::class,'getCompanySetting'])->name('get-company-setting');
        }
    );
});
