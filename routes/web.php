<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductController;

// Home page
Route::get('/', function () {
    return view('index');
});

// Static pages
Route::get('aboutUs', function () {
    return view('aboutUs');
});
Route::get('basket', function () {
    return view('basket');
});
Route::get('customerSupport', function () {
    return view('customerSupport');
});

Route::get('/signUp', [RegisterController::class, 'showForm'])->name('register.form');

Route::post('/signUp', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');

Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');


Route::get('shop', function () {
    return view('shop');
});





Route::post('/contact-submit', [ContactFormController::class, 'submit']);
// Product Search Routes
Route::get('/products', [ProductController::class, 'index'])->name('products');


Route::get('/admin/products', [ProductController::class, 'adminIndex'])
    ->name('admin.products')
    ->middleware('auth');  
