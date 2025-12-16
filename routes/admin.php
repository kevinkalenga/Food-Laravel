<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController;





Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
   
      
      // Auth Routes

      // Route::get('/auth', [AdminAuthController::class, 'index'])->name('auth');
      
      
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

      // Profile Routes
      Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
      Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('update');

});

