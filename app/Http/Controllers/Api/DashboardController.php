<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Mengambil user yang login

        // Hitung total pemasukan
        $income = Transaction::where('user_id', $userId)
            ->where('type', 'pemasukan')
            ->sum('amount');

        // Hitung total pengeluaran
        $expense = Transaction::where('user_id', $userId)
            ->where('type', 'pengeluaran')
            ->sum('amount');

        // Hitung saldo
        $balance = $income - $expense;

        return response()->json([
            'status' => 'success',
            'data' => [
                'total_income' => (float) $income,
                'total_expense' => (float) $expense,
                'balance' => (float) $balance,
            ]
        ]);
    }
}