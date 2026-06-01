<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        // Menggunakan 'with' agar frontend dapat data kategori sekaligus
        return response()->json([
            'status' => 'success',
            'data' => Budget::where('user_id', Auth::id())->with('category')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'nominal_limit' => 'required|numeric'
        ]);

        $budget = Budget::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'nominal_limit' => $request->nominal_limit
        ]);

        return response()->json(['status' => 'success', 'data' => $budget], 201);
    }
    
    // update dan destroy bisa dibuat mirip dengan TransactionController
}