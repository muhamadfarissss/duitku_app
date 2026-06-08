<?php

use App\Http\Controllers\ProfileController;

// 1. IMPORT SEMUA CONTROLLER API KAMU DI SINI
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\AiTransactionController;

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// KELOMPOK RUTE YANG WAJIB LOGIN
Route::middleware(['auth', 'verified'])->group(function () {
    
    // ==========================================
    // A. RUTE TAMPILAN HALAMAN (VIEW BLADE)
    // ==========================================
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/transaction', function () { return view('transaction'); })->name('transaction');
    Route::get('/category', function () { return view('category'); })->name('category');

    // ==========================================
    // B. RUTE AJAX / JAVASCRIPT (Jalur Data)
    // ==========================================
    Route::prefix('api')->group(function () {
        // Dashboard
        Route::get('/dashboard-summary', [DashboardController::class, 'index']);
        
        // Transaksi
        Route::get('/transactions', [TransactionController::class, 'index']);
        Route::post('/transactions', [TransactionController::class, 'store']);
        Route::put('/transactions/{id}', [TransactionController::class, 'update']);
        Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

        // Kategori & Budget
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('budgets', BudgetController::class);

        // AI Input
        Route::post('/ai-input', [AiTransactionController::class, 'process']);
    });

});

// Kelompok Profil Bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';