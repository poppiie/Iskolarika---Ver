<?php

use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function () {
    // handle the form data
    return 'Registered!';
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


use App\Http\Controllers\CustomRegisterController;

Route::get('/register', [CustomRegisterController::class, 'show'])->name('register');
Route::post('/register', [CustomRegisterController::class, 'store']);


use App\Http\Controllers\CustomLoginController;

Route::get('/login', [CustomLoginController::class, 'show'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login']);
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard'); // placeholder
})->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
})->middleware('auth')->name('dashboard-admin');

use App\Http\Controllers\Auth\PasswordResetLinkController;

use App\Http\Controllers\Auth\NewPasswordController;

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');


Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');

use App\Http\Controllers\AdminLoginController;

Route::get('/admin-login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin-logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
