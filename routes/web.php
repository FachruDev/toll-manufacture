<?php

use App\Livewire\Welcome;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', Welcome::class)->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Customer Registration
Route::get('/register', [RegisterController::class, 'showCustomerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'registerCustomer'])->name('register.submit');

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->intended('/');
})->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return back();
    }
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Password reset
Route::get('/forgot-password', [PasswordController::class, 'showForgot'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [PasswordController::class, 'sendResetLink'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [PasswordController::class, 'showReset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'reset'])->middleware('guest')->name('password.update');

// Admin panel (superadmin, admin, dephead, supervisor)
Route::middleware(['auth', 'role:superadmin|admin|dephead|supervisor'])->prefix('admin')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('admin.dashboard');
    // Settings -> Mail
    Route::get('/settings/mail', [MailSettingController::class, 'edit'])->name('admin.settings.mail.edit');
    Route::put('/settings/mail', [MailSettingController::class, 'update'])->name('admin.settings.mail.update');
    Route::post('/settings/mail/test', [MailSettingController::class, 'sendTest'])->name('admin.settings.mail.test');
});

// Customer panel
Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {
    Route::get('/', CustomerDashboardController::class)->name('customer.dashboard');
});
