<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use App\Models\Category; // Tambahkan ini
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class AiTransactionController extends Controller
{
    public function process(Request $request)
    {
        $request->validate(['text' => 'required|string']);
        $userInput = $request->input('text');

        // 1. Ambil semua kategori user yang login agar AI hanya pilih dari sini
        $userCategories = Category::where('user_id', Auth::id())
            ->pluck('name')
            ->toArray();
            
        $categoryList = implode(", ", $userCategories);

        // 2. Prompt Engineering: Membatasi AI hanya pada kategori yang ada
        $systemPrompt = "Kamu adalah asisten keuangan cerdas. Tugasmu mengekstrak kalimat user ke dalam format JSON.
        Aturan baku:
        1. Kembalikan HANYA format JSON.
        2. Key JSON: 'tipe' (pemasukan/pengeluaran), 'nominal' (integer), 'kategori', 'catatan'.
        3. Gunakan kategori HANYA dari daftar berikut: [{$categoryList}]. Jika tidak cocok, pilih yang paling mendekati.
        
        Kalimat User: '" . $userInput . "'";

        $apiKey = env('GEMINI_API_KEY');
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
        ->retry(3, 200)
        ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent?key={$apiKey}", [
            'contents' => [
                ['parts' => [['text' => $systemPrompt]]]
            ]
        ]);

        if ($response->successful()) {
            $aiResult = $response->json('candidates.0.content.parts.0.text');
            $cleanJson = str_replace(['```json', '```'], '', trim($aiResult));
            $decodedJson = json_decode($cleanJson, true);

            if (!$decodedJson) {
                return response()->json(['status' => 'error', 'message' => 'Format AI tidak valid.'], 422);
            }

            // 3. Simpan ke Database dengan user_id yang aktif
            $transaction = Transaction::create([
                'user_id'  => Auth::id(), 
                'type'     => $decodedJson['tipe'] ?? 'pengeluaran',
                'amount'   => $decodedJson['nominal'] ?? 0,
                'category' => $decodedJson['kategori'] ?? 'Lainnya',
                'notes'    => $decodedJson['catatan'] ?? '-',
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi berhasil dicatat!',
                'data' => $transaction
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'Gagal menghubungi server AI.'], 500);
    }
}