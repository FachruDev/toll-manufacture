<?php

use App\Livewire\Welcome;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', Welcome::class)->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Admin panel (superadmin, admin, dephead, supervisor)
Route::middleware(['auth','role:superadmin|admin|dephead|supervisor'])->prefix('admin')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('admin.dashboard');
});

// Customer panel
Route::middleware(['auth','role:customer'])->prefix('customer')->group(function () {
    Route::get('/', CustomerDashboardController::class)->name('customer.dashboard');
});
