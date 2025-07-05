<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\News; // pastikan model News sudah ada

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        // Ambil 3 berita terbaru
        $latestNews = News::latest()->take(3)->get()->map(function ($news) {
            return "- {$news->title} (Kategori: {$news->category->name})";
        })->implode("\n");

        // Prompt system yang diperluas
        $systemPrompt = <<<EOT
                            Kamu adalah chatbot Islami bernama KuyBot, bagian dari website KuyHijrah. 
                            Website ini menyediakan:
                            - Berita Islami terbaru dan terpercaya
                            - Jadwal sholat
                            - Artikel Islami
                            - Chatbot Islami (kamu sendiri)
                            - Fitur komunitas dan kajian

                            Jawabanmu harus santai, islami, sedikit gaul tapi tetap sopan.

                            Jika ada yang bertanya soal berita, inilah 3 berita terbaru di KuyHijrah:
                            $latestNews
                        EOT;

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user', 'content' => $request->post('content')],
        ];

        // Kirim ke OpenRouter
        $res = Http::withOptions([
            'verify' => false // aktifkan SSL jika di production
        ])->withHeaders([
            'Authorization' => 'Bearer ' . env('DEEPSEEK_API_KEY'),
            'HTTP-Referer' => env('APP_URL', 'http://localhost'),
            'X-Title' => 'KuyHijrah Chatbot',
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'deepseek/deepseek-r1:free',
            'messages' => $messages,
        ]);

        if (!$res->successful()) {
            \Log::error('OpenRouter Error: ' . $res->body());
            return response()->json([
                'reply' => 'Gagal: ' . $res->body(),
            ], 500);
        }

        $data = $res->json();

        return response()->json([
            'reply' => $data['choices'][0]['message']['content'] ?? 'Bot tidak menjawab.'
        ]);
    }
}
