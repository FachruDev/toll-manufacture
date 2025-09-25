<?php

use App\Livewire\Welcome;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\UserManagement\UserController as AdminUserController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\UserManagement\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\UserManagement\PermissionController as AdminPermissionController;
use App\Http\Controllers\Admin\UserManagement\PermissionCategoryController as AdminPermissionCategoryController;
use App\Http\Controllers\PublicTmrController;
use App\Http\Controllers\Admin\TmrController as AdminTmrController;
use App\Http\Controllers\Admin\TmrInviteController as AdminTmrInviteController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Landing page
Route::get('/', Welcome::class)->name('home');

// ===========================================================
//                      AUTHENTICATION
// ===========================================================

// Admin Auth
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login.attempt');

// Customer Auth
Route::get('/customer/login', [AuthController::class, 'showCustomerLogin'])->name('customer.login');
Route::post('/customer/login', [AuthController::class, 'loginCustomer'])->name('customer.login.attempt');
Route::redirect('/login', '/customer/login')->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Public TMR (guest via token)
Route::get('/tmr/invite/{token}', [PublicTmrController::class, 'show'])->name('tmr.invite.show');
Route::post('/tmr/invite/{token}', [PublicTmrController::class, 'submit'])->name('tmr.invite.submit');

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

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

// ===========================================================
//                      ADMIN PANEL
// ===========================================================

// Admin panel
Route::middleware(['auth', 'role:superadmin|admin|dephead|supervisor'])->prefix('admin')->group(function () {
    Route::get('/', AdminDashboardController::class)->name('admin.dashboard');
    // Settings -> Mail
    Route::get('/settings/mail', [MailSettingController::class, 'edit'])->name('admin.settings.mail.edit');
    Route::put('/settings/mail', [MailSettingController::class, 'update'])->name('admin.settings.mail.update');
    Route::post('/settings/mail/test', [MailSettingController::class, 'sendTest'])->name('admin.settings.mail.test');

    // Profile
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('/profile/password', [\App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('admin.profile.password');

    // User management
    Route::resource('users', AdminUserController::class)->except(['show']);
    Route::post('users/bulk-delete', [AdminUserController::class, 'bulkDelete'])->name('users.bulk-delete');
    Route::post('users/{user}/send-verification', [AdminUserController::class, 'sendVerification'])->name('users.send-verification');

    // Customer Management
    Route::resource('customers', AdminCustomerController::class)->except(['show']);
    Route::post('customers/bulk-delete', [AdminCustomerController::class, 'bulkDelete'])->name('customers.bulk-delete');

    // Departments
    Route::resource('departments', AdminDepartmentController::class)->except(['show']);
    Route::post('departments/bulk-delete', [AdminDepartmentController::class, 'bulkDelete'])->name('departments.bulk-delete');

    // Roles & Permissions
    Route::resource('roles', AdminRoleController::class)->except(['show']);
    Route::post('roles/bulk-delete', [AdminRoleController::class, 'bulkDelete'])->name('roles.bulk-delete');
    Route::resource('permissions', AdminPermissionController::class)->except(['show']);
    Route::post('permissions/bulk-delete', [AdminPermissionController::class, 'bulkDelete'])->name('permissions.bulk-delete');
    Route::resource('permission-categories', AdminPermissionCategoryController::class)->parameters(['permission-categories' => 'permission_category'])->except(['show']);
    Route::post('permission-categories/bulk-delete', [AdminPermissionCategoryController::class, 'bulkDelete'])->name('permission-categories.bulk-delete');

    // TMR Admin
    Route::get('/tmrs', [AdminTmrController::class, 'index'])->name('admin.tmrs.index');
    Route::get('/tmrs/{tmr}', [AdminTmrController::class, 'show'])->name('admin.tmrs.show');
    Route::post('/tmrs/{tmr}/approve', [AdminTmrController::class, 'approve'])->middleware('permission:change-status-tmr')->name('admin.tmrs.approve');
    Route::post('/tmrs/{tmr}/reject', [AdminTmrController::class, 'reject'])->middleware('permission:change-status-tmr')->name('admin.tmrs.reject');

    // TMR Invites (no backend permission middleware; enforced on UI later)
    Route::resource('tmr-invites', AdminTmrInviteController::class)->parameters(['tmr-invites' => 'tmr_invite'])->only(['index','create','store','show','destroy']);
});

// ===========================================================
//                      CUSTOMER PANEL
// ===========================================================

// Customer panel
Route::middleware(['auth', 'role:customer'])->prefix('customer')->group(function () {
    Route::get('/', CustomerDashboardController::class)->name('customer.dashboard');
});

// ===========================================================
//                  EMAIL VERIFICATION
// ===========================================================

// Email verification handler
Route::get('/email/verify/{id}/{hash}', function (Request $request) {
    $userId = $request->route('id');
    $hash = $request->route('hash');

    try {
        // Try to find user in users table first
        $user = \App\Models\User::find($userId);
        $isUserTable = true;

        // If not found in users table, try customers table
        if (!$user) {
            $user = \App\Models\Customer::find($userId);
            $isUserTable = false;
        }

        // If still not found, return error
        if (!$user) {
            return redirect()->route('home')->with('error', 'User tidak ditemukan.');
        }

        // Mark email as verified if not already verified
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new \Illuminate\Auth\Events\Verified($user));
        }

        // Redirect based on which table the user is from
        if ($isUserTable) {
            return redirect()->route('admin.login')->with('success', 'Email berhasil diverifikasi! Silakan login untuk melanjutkan.');
        } else {
            return redirect()->route('customer.login')->with('success', 'Email berhasil diverifikasi! Silakan login untuk melanjutkan.');
        }

    } catch (\Exception $e) {
        \Log::error('Email verification error', [
            'error' => $e->getMessage(),
            'user_id' => $userId
        ]);
        return redirect()->route('home')->with('error', 'Terjadi kesalahan saat verifikasi email.');
    }
})->name('verification.verify');
