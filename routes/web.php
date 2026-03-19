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
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VariantController;

// Home page
Route::get('/', function () {
    // Updated the route to fetch data first
    $homepage = \App\Models\Product::all(); 
    return view('index', ['homepage' => $homepage]);
});
// VARIANTS
Route::get('/admin/products/{product}/variants/create', [VariantController::class, 'create'])->name('admin.variants.create');
Route::post('/admin/products/{product}/variants', [VariantController::class, 'store'])->name('admin.variants.store');
Route::get('/admin/variants/{variant}/edit', [VariantController::class, 'edit'])->name('admin.variants.edit');
Route::put('/admin/variants/{variant}', [VariantController::class, 'update'])->name('admin.variants.update');

Route::delete('/admin/variants/{variant}', [VariantController::class, 'destroy'])->name('admin.variants.destroy');

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

Route::get('/shop', [ProductController::class, 'index'])->name('products');

Route::get('/product/{id}', [ProductController::class, 'show'])
    ->name('product.show');

// VARIANTS
Route::get('/admin/products/{product}/variants/create', [VariantController::class, 'create'])->name('admin.variants.create');
Route::post('/admin/products/{product}/variants', [VariantController::class, 'store'])->name('admin.variants.store');

Route::delete('/admin/variants/{variant}', [VariantController::class, 'destroy'])->name('admin.variants.destroy');
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



Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    /*
    | ORDERS (ADMIN + SUPER ADMIN)
    */
    Route::middleware('can:isAdmin')->group(function () {
        Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders');
        Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.status');
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

    /*
    | Route for Reports
    */
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('admin.reports');

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
Route::get('homepage',[App\Http\Controllers\ProductController::class,'homepage']);