<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;

// Page d'accueil
Route::get('/', [FrontendController::class, 'index'])->name('home');

// ----------------------
// LOGIN ADMIN (PUBLIC)
// ----------------------
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

// ----------------------
// LOGIN USER (PUBLIC)
// ----------------------
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// POST login user
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])
    ->name('login.post');

// ----------------------
// DASHBOARD USER (PROTÉGÉ)
// ----------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard_user');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');


});

// ----------------------
// INCLUDE admin.php
// ----------------------
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';



