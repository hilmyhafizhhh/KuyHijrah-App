<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlQuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $response = Http::get('https://equran.id/api/v2/surat');
        $response = Http::withoutVerifying()->get('https://equran.id/api/v2/surat');
        $surahs = collect($response->json('data'))->map(function ($item) {
            return (object) $item;
        });


        return view('quran', compact('surahs'), ["title" => "Al-Qur'an"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::withoutVerifying()->get("https://equran.id/api/v2/surat/{$id}");

        if ($response->failed()) {
            abort(404, 'Surah not found.');
        }

        $surah = $response->json('data'); // ini array

        return view('detail_surah', [
            'title' => 'Detail Surah',
            'surah' => (object) $surah  // kita cast jadi object agar bisa pakai -> di Blade
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
