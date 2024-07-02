<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;


Route::get('/', [GuestController::class, 'index'])->name('home');


Auth::routes();

// User Routes
Route::middleware(['auth', 'access-level:user'])->prefix('u')->group(function () {
  
    Route::get('/profile', [HomeController::class, 'index'])->name('user.profile');
});
  
// Admin Routes
Route::middleware(['auth', 'access-level:admin'])->prefix('admin')->group(function () {
  
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/user', UserController::class);
    Route::resource('/book', BookController::class);


});