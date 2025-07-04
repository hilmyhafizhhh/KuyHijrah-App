@extends('layouts.main')

@section('container')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&family=Amiri&display=swap');

    .hero-section {
      background: linear-gradient(to bottom right, #dcfce7, #f0fdf4);
      min-height: 96vh;
      padding: 6rem 1.25rem;
      position: relative;
      overflow: hidden;
    }

    .hero-title {
      font-family: 'Tajawal', sans-serif;
      font-size: 2.8rem;
      color: #166534;
    }

    .hero-highlight {
      color: #15803d;
    }

    .hero-desc {
      font-family: 'Amiri', serif;
      font-size: 1.2rem;
      color: #374151;
      max-width: 620px;
    }

    .btn-green {
      background-color: #16a34a;
      color: white;
      font-family: 'Tajawal', sans-serif;
      transition: background-color 0.3s ease;
    }

    .btn-green:hover {
      background-color: #15803d;
      color: white;
    }

    .btn-outline-green {
      border: 2px solid #15803d;
      color: #15803d;
      background-color: transparent;
      font-family: 'Tajawal', sans-serif;
      transition: all 0.3s ease;
    }

    .btn-outline-green:hover {
      background-color: #15803d;
      color: white;
    }

    .ornament {
      position: absolute;
      bottom: -40px;
      left: -40px;
      width: 150px;
      opacity: 0.08;
    }

    .ornament-top {
      position: absolute;
      top: -30px;
      right: -30px;
      width: 160px;
      opacity: 0.06;
    }

    @media (max-width: 576px) {
      .hero-title {
        font-size: 2rem;
      }

      .btn-green,
      .btn-outline-green {
        font-size: 1rem;
        padding: 0.5rem 1.5rem;
      }
    }
  </style>

  <section class="hero-section d-flex flex-column align-items-center justify-content-center text-center">
    {{-- <img src="/images/ornament-islamic.svg" class="ornament" alt="Ornament">
    <img src="/images/ornament-islamic.svg" class="ornament-top" alt="Ornament Top"> --}}

    <h1 class="fw-bold mb-3 hero-title" data-aos="fade-down" data-aos-duration="1000">
      Selamat Datang di <span class="hero-highlight">KuyHijrah</span>
    </h1>

    <p class="mb-4 hero-desc" data-aos="fade-up" data-aos-duration="1200">
      Platform Islami modern yang menemani perjalanan hijrah Anda — dari membaca Al-Qur'an, mengetahui waktu sholat, hingga menyimak berita Islam terkini.
    </p>

    <div class="d-flex flex-wrap justify-content-center gap-3" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1300">
      <a href="quran" class="btn btn-green px-4 py-2 fs-5 shadow rounded-pill">
        📖 Baca Al-Qur'an
      </a>
      <a href="jadwal-sholat" class="btn btn-outline-green px-4 py-2 fs-5 shadow rounded-pill">
        🕌 Jadwal Sholat
      </a>
    </div>
  </section>
@endsection
