<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('admin.auth.login');
    }

    public function checkLogin(LoginRequest $request)
    {
        $data = $request->validated();
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Login successful.');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        return view('admin.auth.register');
    }

    public function registeration(RegisterRequest $request)
    {
        $data = $request->validated();
        $tenant = Tenant::create([
            'name' => $data['business_name'],
            'domain' => Str::slug($data['business_name']) . '.qikbill.com',
            'owner_name' => $data['name'],
            'owner_email' => $data['email'],
        ]);

        if($tenant) {
            $user = $tenant->users()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
        }
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function forgotPassword(Request $request)
    {
        return view('admin.auth.forgetpassword');
    }

    public function submitForgotPassword(Request $request)
    {
        // Handle forgot password logic here
        return back()->with('success', 'If your email is registered, you will receive a password reset link.');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
