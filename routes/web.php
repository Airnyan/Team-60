<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

// Home page
Route::get('/', function () {
    $homepage = \App\Models\Product::all();
    return view('index', ['homepage' => $homepage]);
});

// Static pages
Route::get('aboutUs', function () {
    return view('aboutUs');
});

Route::get('basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/add', [BasketController::class, 'store'])->name('basket.add');
Route::post('/checkout', [BasketController::class, 'checkout'])->name('basket.checkout');
Route::post('/basket/update/{product_id}', [BasketController::class, 'update'])->name('basket.update');

Route::get('customerSupport', function () {
    return view('customerSupport');
});

Route::get('shop', [ProductController::class, 'index'])->name('shop');

// Authentication Routes
Route::get('register', function () {
    return view('register');
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

Route::post('/contact-submit', [ContactFormController::class, 'submit']);

// Product Search Routes
Route::get('/products', [ProductController::class, 'index'])->name('products');

// ==========================
// USER: Order History/Status
// ==========================
Route::get('/orders', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('orders.index');

Route::post('/orders/{order}/return', [OrderController::class, 'returnProduct'])
    ->middleware('auth')
    ->name('orders.return');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    /*
    | ORDERS (ADMIN + SUPER ADMIN)
    */
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
        Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.status');
    });

    /*
    | PRODUCTS (ADMIN + SUPER ADMIN)
    */
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/products', [ProductController::class, 'adminIndex'])->name('admin.products');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    /*
    | USERS (SUPER ADMIN ONLY)
    */
    Route::middleware('can:isSuperAdmin')->group(function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::patch('/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.role');
        Route::patch('/users/{user}/make-admin', [AdminUserController::class, 'makeAdmin'])->name('admin.users.makeAdmin');
        Route::patch('/users/{user}/remove-admin', [AdminUserController::class, 'removeAdmin'])->name('admin.users.removeAdmin');
        Route::get('/users/dashboard', [AdminUserController::class, 'dashboard'])->name('admin.users.dashboard');
        Route::post('/users/{user}/reset-password', [AdminUserController::class, 'sendReset'])->name('admin.users.reset');
    });

    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/users/index', [AdminUserController::class, 'indexUser'])->name('admin.users.indexuser');
    });

});

// Profile Page
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])
        ->name('profile.delete');

    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');

});

// Homepage Items
Route::get('homepage', [App\Http\Controllers\ProductController::class, 'homepage']);