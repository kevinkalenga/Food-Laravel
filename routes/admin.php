<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminAuthController;

// ----------------------
// ROUTES ADMIN PROTÉGÉES
// ----------------------
// Route::middleware(['auth', 'role:admin'])
//     ->prefix('admin')
//     ->group(function () {

//         // Dashboard admin
//         Route::get('/dashboard', [AdminDashboardController::class, 'index'])
//             ->name('admin.dashboard');

//         // Profile admin
//         Route::get('/profile', [ProfileController::class, 'index'])
//             ->name('admin.profile');

//         Route::put('/profile', [ProfileController::class, 'updateProfile'])
//             ->name('admin.profile.update');

//         Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
//             ->name('admin.profile.password.update');
//     });




Route::middleware(['auth:admin', 'role:admin,admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('admin.profile');

        Route::put('/profile', [ProfileController::class, 'updateProfile'])
            ->name('admin.profile.update');

        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])
            ->name('admin.profile.password.update'); 
        Route::post('/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

    });



