<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->hasAnyRole(['superadmin','admin','dephead','supervisor'])) {
                return redirect()->intended('/admin');
            }
            if ($user->hasRole('customer')) {
                return redirect()->intended('/customer');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Login gagal. Periksa kredensial.'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}

