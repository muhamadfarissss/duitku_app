<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AiTransactionController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BudgetController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard-summary', [DashboardController::class, 'index']);
    // List & Input Manual
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    
    // Edit & Hapus
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

    // Rute Kategori
    Route::apiResource('categories', CategoryController::class);
    // Rute Budget
    Route::apiResource('budgets', BudgetController::class);

    Route::post('/ai-input', [AiTransactionController::class, 'process']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
