<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('leading');
})->name('leading');


Auth::routes();

Route::middleware(['auth', 'access-level:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
// admin routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {
  
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
});