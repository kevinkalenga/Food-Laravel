<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;





Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
   
      
      // Auth Routes

      // Route::get('/auth', [AdminAuthController::class, 'index'])->name('auth');
      
      
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

});

