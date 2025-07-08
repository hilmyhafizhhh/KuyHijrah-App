@extends('layouts.main')

@section('container')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;600;700&display=swap');

    .jadwal-sholat-section {
        /* background: linear-gradient(to bottom right, #dcfce7, #f0fdf4); */
        background: linear-gradient(to bottom right, #e8f5e9, #f0fdf4);
        padding: 6rem 1.5rem 3rem;
        font-family: 'Tajawal', sans-serif;
    }

    .card-prayer {
        background: #ffffff;
        border: 2px solid #16a34a20;
        border-left: 5px solid #16a34a;
        border-radius: 1rem;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: 0.3s ease;
    }

    .card-prayer:hover {
        box-shadow: 0 4px 16px rgba(22, 163, 74, 0.2);
    }

    .prayer-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: #166534;
    }

    .prayer-time {
        font-size: 1.5rem;
        font-weight: 700;
        color: #16a34a;
    }

    .highlight {
        background-color: #d1fae5;
        border-left: 5px solid #15803d;
    }

    .form-control, .form-select {
        border: 2px solid #16a34a;
        border-radius: 25px;
        padding: 0.5rem 1.25rem;
    }

    .btn-primary {
        background-color: #16a34a;
        border-color: #16a34a;
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
    }

    .btn-primary:hover {
        background-color: #15803d;
        border-color: #15803d;
    }

    #countdown {
        font-size: 1rem;
        font-weight: 600;
        color: #065f46;
        margin-top: 2rem;
    }

    .divider {
        height: 2px;
        background: #d1fae5;
        margin: 2rem 0;
    }
</style>

<section class="jadwal-sholat-section">
    <div class="container">
        <h1 class="text-center fw-bold text-success mb-5">🕌 Jadwal Sholat</h1>

        {{-- Form Filter --}}
        <form id="formJadwal" class="row justify-content-center gx-3 gy-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="city" value="{{ $city }}" class="form-control" placeholder="Kota">
            </div>
            <div class="col-md-3">
                <input type="text" name="country" value="{{ $country }}" class="form-control" placeholder="Negara">
            </div>
            <div class="col-md-3">
                <select name="method" class="form-select">
                    @foreach(range(2,13) as $m)
                        <option value="{{ $m }}" {{ $method == $m ? 'selected' : '' }}>Method {{ $m }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary">🔍 Cari</button>
            </div>
            <div class="col-12 text-center">
                <button type="button" id="geoBtn" class="btn btn-outline-success btn-sm mt-2">📍 Deteksi Lokasi Otomatis</button>
            </div>
        </form>

        {{-- Lokasi Saat Ini --}}
        <div class="text-center mb-4">
            <h5 class="text-secondary">Lokasi: <span class="text-success fw-semibold">{{ $city }}, {{ $country }}</span></h5>
        </div>

        {{-- Waktu Sholat --}}
        <div class="row g-3 justify-content-center">
            @php
                $now = \Carbon\Carbon::now();
                $next = null;
            @endphp
            @foreach (['Fajr','Dhuhr','Asr','Maghrib','Isha'] as $pray)
                @php
                    $time = \Carbon\Carbon::parse($timings[$pray]);
                    $isNext = !$next && $time > $now;
                    if ($isNext) $next = $pray;
                @endphp
                <div class="col-md-4">
                    <div class="card-prayer {{ $isNext ? 'highlight' : '' }}">
                        <div class="prayer-title">{{ $pray }}</div>
                        <div class="prayer-time" id="time-{{ strtolower($pray) }}">{{ $time->format('H:i') }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="countdown" class="text-center"></div>
{{-- 
        <div class="divider"></div>
        <div class="text-center">
            <a href="/" class="btn btn-outline-success rounded-pill">← Kembali ke Beranda</a>
        </div> --}}
    </div>
</section>

<script>
    // Lokasi otomatis
    document.getElementById('geoBtn').addEventListener('click', () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(pos => {
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.coords.latitude}&lon=${pos.coords.longitude}`)
                    .then(res => res.json())
                    .then(data => {
                        const city = data.address.city || data.address.town || data.address.village || '';
                        const country = data.address.country || '';
                        document.querySelector('input[name=city]').value = city;
                        document.querySelector('input[name=country]').value = country;
                        document.getElementById('formJadwal').submit();
                    });
            });
        }
    });

    // Countdown waktu sholat berikutnya
    function countdown() {
        const now = new Date();
        const ids = ['fajr','dhuhr','asr','maghrib','isha'];
        let target = null, name = '';
        for (const id of ids) {
            const [h, m] = document.getElementById(`time-${id}`).innerText.split(':');
            const t = new Date();
            t.setHours(h, m, 0);
            if (t > now) {
                target = t;
                name = id.toUpperCase();
                break;
            }
        }
        if (!target) {
            const [h, m] = document.getElementById('time-fajr').innerText.split(':');
            target = new Date();
            target.setDate(target.getDate() + 1);
            target.setHours(h, m, 0);
            name = 'FAJR';
        }
        const diff = target - now;
        const h = String(Math.floor(diff / 3600000)).padStart(2, '0');
        const m = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
        const s = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
        document.getElementById('countdown').innerText = `⏳ Menuju ${name}: ${h}:${m}:${s}`;
    }
    setInterval(countdown, 1000);
    countdown();
</script>
@endsection
