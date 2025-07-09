<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\News;

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

        // Static knowledge base
        $knowledge = [
            "@fitur" => [
                [
                    "nama" => "Al-Qur’an Interaktif",
                    "deskripsi" => "Baca dan dengarkan ayat suci dengan tampilan yang nyaman dan rapi."
                ],
                [
                    "nama" => "Jadwal Sholat Otomatis",
                    "deskripsi" => "Waktu sholat harian yang akurat sesuai lokasi Anda secara real-time."
                ],
                [
                    "nama" => "Berita Islami",
                    "deskripsi" => "Berita dan inspirasi dari dunia Islam yang memperkuat iman dan wawasan."
                ]
            ],
            "@kenapa" => [
                "✅ Fokus Islami: Semua fitur dirancang untuk membantu perjalanan hijrah secara syar'i dan relevan.",
                "✅ Teknologi Modern: Menggunakan stack terbaru untuk kenyamanan dan kecepatan akses pengguna.",
                "✅ Komitmen Jangka Panjang: Kami berkomitmen untuk terus menambah fitur Islami yang edukatif dan inspiratif."
            ],
            "@misi" => "Menjadi sahabat digital umat Muslim — menghadirkan solusi Islami yang praktis, informatif, dan terpercaya dalam genggaman.",
            "@nilai" => [
                "✅ Amanah — Memberikan informasi dan fitur yang dapat dipercaya",
                "✅ Manfaat — Setiap fitur punya nilai dan tujuan kebaikan",
                "✅ Kesederhanaan — Desain yang ramah dan mudah digunakan",
                "✅ Keterbukaan — Terbuka terhadap saran dan kontribusi umat"
            ],
            "@tim" => [
                [
                    "nama" => "Muhammad Hilmy Hafizh",
                    "peran" => "Backend Developer",
                    "deskripsi" => "Mengembangkan dan mengelola sistem backend KuyHijrah, termasuk database, API, dan keamanan data pengguna."
                ],
                [
                    "nama" => "Adam Nur Zidane",
                    "peran" => "Frontend Developer",
                    "deskripsi" => "Bertanggung jawab atas desain antarmuka dan implementasi UI yang responsif dan ramah pengguna di semua perangkat."
                ],
                [
                    "nama" => "Arya Suprobo",
                    "peran" => "Project Manager",
                    "deskripsi" => "Mengelola alur kerja proyek, komunikasi tim, dan memastikan setiap fitur berjalan sesuai visi misi KuyHijrah."
                ]
            ]
        ];

        $fiturText = collect($knowledge['@fitur'])->map(fn ($f) => "- {$f['nama']}: {$f['deskripsi']}")->implode("\n");
        $kenapaText = implode("\n", $knowledge['@kenapa']);
        $misi = $knowledge['@misi'];
        $nilaiText = implode("\n", $knowledge['@nilai']);
        $timText = collect($knowledge['@tim'])->map(fn ($t) => "- {$t['nama']} ({$t['peran']}): {$t['deskripsi']}")->implode("\n");

        // Prompt system yang lengkap
        $systemPrompt = <<<EOT
        Kamu adalah KuyBot, chatbot Islami dari website KuyHijrah.

        📌 Fitur KuyHijrah:
        $fiturText

        🔍 Kenapa Memilih KuyHijrah:
        $kenapaText

        🎯 Misi Kami:
        $misi

        🌱 Nilai-Nilai KuyHijrah:
        $nilaiText

        🧑‍💻 Tim di Balik KuyHijrah:
        $timText

        📰 3 Berita Terbaru:
        $latestNews

        Balas semua pertanyaan user dengan bahasa santai, islami, sopan, dan tetap informatif.
        EOT;

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
            ['role' => 'user', 'content' => $request->post('content')],
        ];

        $res = Http::withOptions([
            'verify' => false
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

        try {
            $data = $res->json();
            $reply = $data['choices'][0]['message']['content'] ?? 'Bot tidak menjawab.';
            return response()->json(['reply' => $reply]);
        } catch (\Exception $e) {
            \Log::error('JSON Parse Error: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Maaf, KuyBot mengalami gangguan teknis (format tidak valid).',
            ], 500);
        }
    }
}
