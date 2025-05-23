<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController
{
    public function index()
    {
        return view('user.login');
    }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required',],
            'password' => ['required'],
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'user']))) {
            return redirect()->intended('user/dashboard');
        }
        return redirect()->back()->withErrors(['email' => 'User credentials are incorrect']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
}
