<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return redirect()->route('customer.login');
    }

    public function login(Request $request)
    {
        // Fallback legacy endpoint: redirect to customer login logic
        return $this->loginCustomer($request);
    }

    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }

    public function loginAdmin(Request $request)
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
            Auth::logout();
            return back()->withErrors(['email' => 'Akun ini bukan akun Admin.'])->onlyInput('email');
        }

        return back()->withErrors(['email' => 'Login gagal. Periksa kredensial.'])->onlyInput('email');
    }

    public function showCustomerLogin()
    {
        return view('auth.customer-login');
    }

    public function loginCustomer(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = Auth::user();

            if (! $user->hasRole('customer')) {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini bukan akun Customer.'])->onlyInput('email');
            }

            if (!$user->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }
            return redirect()->intended('/customer');
        }

        return back()->withErrors(['email' => 'Login gagal. Periksa kredensial.'])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('customer.login');
    }
}
