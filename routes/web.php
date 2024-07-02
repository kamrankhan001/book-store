<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('book/{id}', [GuestController::class, 'show'])->name('show');

Auth::routes();

// User Routes
Route::middleware(['auth', 'access-level:user'])
    ->prefix('u')
    ->group(function () {
        Route::post('/books/{book}/favorite', [BookController::class, 'addFavorite'])->name('books.addFavorite');
        Route::delete('/books/{book}/favorite', [BookController::class, 'removeFavorite'])->name('books.removeFavorite');

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile/edit', [HomeController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [HomeController::class, 'update'])->name('profile.update');
    });

// Admin Routes
Route::middleware(['auth', 'access-level:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('/user', UserController::class);
        Route::resource('/book', BookController::class);
    });
