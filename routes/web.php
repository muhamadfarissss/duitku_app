<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard preview tanpa login
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

// Halaman Transaksi
Route::get('/transaction', function () {return view('transaction');})->name('transaction');

// Kelompok Profil Bawaan Breeze tetap butuh login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';