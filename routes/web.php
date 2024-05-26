<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'store'])->name('register.store');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');


Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/form', [DashboardController::class, 'form'])->name('form.recall');
    Route::post('/form', [DashboardController::class, 'store'])->name('store.recall');
    Route::get('/hasil', [DashboardController::class, 'hasil'])->name('hasil.recall');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
