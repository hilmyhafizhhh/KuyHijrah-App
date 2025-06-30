<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class JadwalSholatController extends Controller
{
    public function index(Request $req)
    {
        $title = 'Jadwal Sholat';
        $city    = $req->city    ?? 'Jakarta';
        $country = $req->country ?? 'Indonesia';
        $method  = $req->method  ?? 11; // default method

        $response = Http::withoutVerifying()->get('https://api.aladhan.com/v1/timingsByCity/' . date('Y-m-d'), [
            'city' => $city,
            'country' => $country,
            'method' => $method
        ]);

        $data    = $response->json('data');
        $timings = $data['timings'];

        return view('jadwal_sholat', compact('title', 'timings', 'city', 'country', 'method'));
    }
}
