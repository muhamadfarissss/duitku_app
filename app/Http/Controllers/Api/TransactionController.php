<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // 1. Ambil List Transaksi (Riwayat)
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return response()->json(['status' => 'success', 'data' => $transactions]);
    }

    // 2. Tambah Transaksi Manual
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:pemasukan,pengeluaran',
            'amount' => 'required|numeric',
            'category' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'amount' => $request->amount,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        return response()->json(['status' => 'success', 'data' => $transaction], 201);
    }

    // 3. Edit Transaksi
    public function update(Request $request, $id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);

        $transaction->update($request->all());

        return response()->json(['status' => 'success', 'data' => $transaction]);
    }

    // 4. Hapus Transaksi
    public function destroy($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);
        $transaction->delete();

        return response()->json(['status' => 'success', 'message' => 'Transaksi dihapus']);
    }
}