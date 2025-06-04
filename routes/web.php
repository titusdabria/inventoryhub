<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;

require __DIR__.'/auth.php';

// Dark/Light mode váltás
Route::post('/theme/{mode}', function ($mode) {
    $allowed = ['light-mode', 'dark-mode'];
    if (in_array($mode, $allowed)) {
        session(['theme' => $mode]);
        return response()->json(['theme' => $mode]);
    }
    return response()->json(['error' => 'Invalid mode'], 400);
})->name('theme.set');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/tickets',[TicketsController::class, 'index'])->name('tickets');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});