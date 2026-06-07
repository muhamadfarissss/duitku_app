<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Budget; // Tambahkan ini untuk memanggil tabel budget
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); 

        $income = Transaction::where('user_id', $userId)->where('type', 'pemasukan')->sum('amount');
        $expense = Transaction::where('user_id', $userId)->where('type', 'pengeluaran')->sum('amount');
        $balance = $income - $expense;

        // 1. Ambil Pengeluaran yang dikelompokkan per Kategori
        $expensesByCategory = Transaction::where('user_id', $userId)
            ->where('type', 'pengeluaran')
            ->selectRaw('category, SUM(amount) as total')
            ->groupBy('category')
            ->orderByDesc('total') // Urutkan dari pengeluaran terbesar
            ->get();

        // 2. Ambil data Budget beserta relasi Kategorinya
        $budgets = Budget::where('user_id', $userId)->with('category')->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'total_income' => (float) $income,
                'total_expense' => (float) $expense,
                'balance' => (float) $balance,
                'expenses_by_category' => $expensesByCategory,
                'budgets' => $budgets
            ]
        ]);
    }
}