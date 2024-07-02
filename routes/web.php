<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;


Route::get('/', function () {
    return view('leading');
})->name('leading');


Auth::routes();

// User Routes
Route::middleware(['auth', 'access-level:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
// Admin Routes
Route::middleware(['auth', 'access-level:admin'])->prefix('admin')->group(function () {
  
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/user', UserController::class);

});