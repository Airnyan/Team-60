<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
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

Route::get('basket', [BasketController::class, 'index'])->name('basket.index');

Route::get('customerSupport', function () {
    return view('customerSupport');
});

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('shop', function () {
    return view('shop');
});
Route::get('signUp', function () {
    return view('signUp');
});

// Authentication Routes 
Route::get('register', function () {
    return view('register');
});

Route::get('forgotPassword', function () {
    return view('forgotPassword');
});

Route::get('resetPassword', function () {
    return view('resetPassword');
});

Route::post('/contact-submit', [ContactFormController::class, 'submit']);

// Product Search Routes 
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products');