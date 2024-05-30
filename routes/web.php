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
    Route::get('/penukar', [DashboardController::class, 'penukar'])->name('penukar');
    Route::get('/form', [DashboardController::class, 'form'])->name('form.recall');
    Route::post('/form', [DashboardController::class, 'store'])->name('store.recall');
    Route::get('/hasil', [DashboardController::class, 'hasil'])->name('hasil.recall');
    Route::get('/anjuran', [DashboardController::class, 'anjuran'])->name('anjuran');
    Route::get('/tambah-darah', [DashboardController::class, 'tambah_darah'])->name('form.tambah.darah');
    Route::post('/tambah-darah', [DashboardController::class, 'store_tambah_darah'])->name('store.tambah.darah');
    Route::post('/recall-menstruation', [DashboardController::class, 'store_recall_menstruation'])->name('store.menstruation');
    Route::post('/finish-menstruation', [DashboardController::class, 'finish_menstruation'])->name('finish.menstruation');
    Route::post('/recall-no-menstruation', [DashboardController::class, 'store_recall_no_menstruation'])->name('store.no.menstruation');
    Route::post('/finish-no-menstruation', [DashboardController::class, 'finish_no_menstruation'])->name('finish.no.menstruation');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
