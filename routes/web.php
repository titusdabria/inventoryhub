<?php

use Illuminate\Support\Facades\Route;

Route::post('/theme/{mode}', function ($mode) {
    session(['theme' => $mode]);
    return response()->noContent();
});


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/orders', function () {
    return view('orders');
})->name('orders');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');