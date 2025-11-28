<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('index');
});

Route::get('aboutUs', function () {
    return view('aboutUs');
});

Route::get('basket', function () {
    return view('basket');
});

Route::get('customerSupport', function () {
    return view('customerSupport');
});

Route::get('login', function () {
    return view('login');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\PasswordResetController;

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

Route::get('shop', function () {
    return view('shop');
});

Route::get('signUp', function () {
    return view('signUp');
});
