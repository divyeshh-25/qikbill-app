<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return null;
        }

        // Admin area detection by prefix
        if ($request->is('admin') || $request->is('admin/*')) {
            // prefer named route if exists, otherwise fallback to admin login URL
            return Route::has('admin.login') ? route('login') : url('/');
        }

        // For normal users: prefer named route when available
        return Route::has('login') ? route('login') : url('/');
    }
}
