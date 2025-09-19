<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class RegisterController extends Controller
{
    public function showCustomerForm()
    {
        return view('auth.register');
    }

    public function registerCustomer(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required', 'confirmed', PasswordRule::defaults()],
            'company' => ['nullable','string','max:255'],
            'phone' => ['nullable','string','max:50'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('customer');

        Customer::create([
            'user_id' => $user->id,
            'company' => $data['company'] ?? null,
            'phone' => $data['phone'] ?? null,
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect()->route('verification.notice')->with('status', 'Verification link sent to your email.');
    }
}

