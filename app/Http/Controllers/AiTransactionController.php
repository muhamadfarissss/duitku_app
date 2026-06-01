<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction; // Tambahkan ini di bagian atas

class AiTransactionController extends Controller
{
    public function process(Request $request)
    {
        $request->validate(['text' => 'required|string']);
        $userInput = $request->input('text');

        $systemPrompt = "Kamu adalah asisten pencatat keuangan cerdas. Tugasmu mengekstrak kalimat user ke dalam format JSON.
        Aturan baku:
        1. Kembalikan HANYA format JSON.
        2. Key JSON: 'tipe', 'nominal' (integer), 'kategori', 'catatan'.
        Kalimat User: '" . $userInput . "'";

        // 3. Tembak ke API Gemini dengan mekanisme RETRY
        $apiKey = env('GEMINI_API_KEY');
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
        ->retry(3, 200) // <--- Tambahkan baris ini! (Coba 3x, jeda 200ms)
        ->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent?key={$apiKey}", [
            'contents' => [
                ['parts' => [['text' => $systemPrompt]]]
            ]
        ]);

        if ($response->successful()) {
            $aiResult = $response->json('candidates.0.content.parts.0.text');
            $cleanJson = str_replace(['```json', '```'], '', trim($aiResult));
            $decodedJson = json_decode($cleanJson, true);

            // Tambahkan pengecekan ini:
            if (!$decodedJson) {
                return response()->json(['status' => 'error', 'message' => 'Format AI tidak valid.'], 422);
            }

            // Simpan ke Database
            $transaction = Transaction::create([
                'type'     => $decodedJson['tipe'] ?? 'pengeluaran', // Default jika tidak ada
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