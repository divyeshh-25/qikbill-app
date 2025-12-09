<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

include_once __DIR__ . '/admin/auth.php';

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function() {
            Route::get('/', [RoleController::class,'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('edit');
            Route::patch('/update/{role}', [RoleController::class, 'update'])->name('update');
            Route::delete('/delete/{role}', [RoleController::class, 'destroy'])->name('delete');
            Route::get('/permissions/{role}', [RoleController::class,'permissions'])->name('permissions');
            Route::post('/permissions/{role}', [RoleController::class,'syncPermissions'])->name('sync-permissions');
        });
    });
});

Route::get('/super-admin', function () {
    return view('super_admin.dashboard');
})->name('super_admin.dashboard');