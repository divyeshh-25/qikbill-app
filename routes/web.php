<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanySettingController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\POS\GeneralController;
use App\Http\Controllers\Admin\POS\PosController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

include_once __DIR__ . '/admin/auth.php';



Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

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
                Route::get('company-setting', [CompanySettingController::class, 'getCompanySetting'])->name('get-company-setting');
                Route::put('update/{companySetting}',[CompanySettingController::class, 'update'])->name('company-update');
                Route::get('profile',[AuthController::class,'profile'])->name('profile');
                Route::put('profile/{user}',[AuthController::class,'profileUpdate'])->name('profile.update');
            }
        );
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('edit');
            Route::patch('/update/{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('/delete/{role}', [RoleController::class, 'destroy'])->name('delete');
            Route::get('/permissions/{role}', [RoleController::class, 'permissions'])->name('permissions');
            Route::post('/permissions/{role}', [RoleController::class, 'syncPermissions'])->name('sync-permissions');
        });

        Route::group(['prefix' => 'pos', 'as' => 'pos.'], function() {
            Route::get('/',[PosController::class,'index'])->name('index');
            Route::post('/cash-register',[GeneralController::class,'cashRegister'])->name('cash-register');
            Route::post('/print-receipt',[GeneralController::class,'printReceipt'])->name('print-receipt');
            Route::post('/today-sale',[GeneralController::class,'todaySale'])->name('today-sale');
            Route::get('/order-discount',[GeneralController::class,'orderDiscount'])->name('order-discount');
            Route::get('/order-tax',[GeneralController::class,'orderTax'])->name('order-tax');
            Route::get('/shipping-cost',[GeneralController::class,'shippingCost'])->name('shipping-cost');
            Route::get('/hold-order',[GeneralController::class,'holdOrder'])->name('hold-order');
            Route::get('/create-customer',[GeneralController::class,'createCustomer'])->name('create-customer');    
            Route::get('/reset-order',[GeneralController::class,'resetOrder'])->name('reset-order');
            Route::get('/view-orders',[GeneralController::class,'viewOrders'])->name('view-orders');
            Route::get('/show-product',[GeneralController::class,'showProduct'])->name('show-product');
            Route::get('/edit-product',[GeneralController::class,'editProduct'])->name('edit-product');
            Route::get('/delete-product',[GeneralController::class,'deleteProduct'])->name('delete-product');
            Route::get('/recent-transaction',[GeneralController::class,'recentTransaction'])->name('recent-transaction');
        });
    });
});

Route::get('/super-admin', function () {
    return view('super_admin.dashboard');
})->name('super_admin.dashboard');
