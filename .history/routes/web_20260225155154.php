<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\PageController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Authentication pages (static design only)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Protected pages (just design, no middleware yet)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/analyze', [AnalyzeController::class, 'index'])->name('analyze');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

// Admin pages
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// Static pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');