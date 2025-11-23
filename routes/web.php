<?php

use Illuminate\Support\Facades\Route;

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

Route::get('shop', function () {
    return view('shop');
});

Route::get('signUp', function () {
    return view('signUp');
});
