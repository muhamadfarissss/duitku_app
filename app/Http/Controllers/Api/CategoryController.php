<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        // Ambil kategori milik user yang sedang login
        return response()->json([
            'status' => 'success',
            'data' => Category::where('user_id', Auth::id())->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'type' => 'nullable|string' 
        ]);

        $category = Category::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'icon'    => $request->icon ?? '🍔',
            
            // GARIS MIRINGNYA SUDAH SAYA HAPUS DI BAWAH INI:
            'type'    => $request->type ?? 'Pengeluaran', 
        ]);

        return response()->json(['status' => 'success', 'data' => $category], 201);
    }

    public function destroy($id)
    {
        Category::where('user_id', Auth::id())->findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Kategori dihapus']);
    }
}