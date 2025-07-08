@extends('layouts.main')

@section('container')
  <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&family=Amiri&display=swap'); */
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&family=Amiri&display=swap');

    .hero-section {
      /* background: linear-gradient(to bottom right, #dcfce7, #f0fdf4); */
      background: linear-gradient(to bottom right, #e8f5e9, #f0fdf4);
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

    /* .hero-highlight {
      color: #166534;
      background: linear-gradient(to right, #16a34a, #4ade80);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    } */

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

    .fitur-section {
      background: linear-gradient(to bottom, #f0fdf4, #ffffff);
    }

    .fitur-card {
      border-radius: 1rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background-color: #ffffff;
    }

    .fitur-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 1rem 1.5rem rgba(22, 163, 74, 0.1);
    }

    .quote-section {
      background-color: #fffffb;
    }

    .quote-card {
      background: #fff;
      border-left: 6px solid #16a34a;
      transition: all 0.3s ease;
    }

    .quote-card:hover {
      transform: scale(1.02);
      background-color: #fef9c3;
    }

    .timeline-section {
      background-color: #f5fff8;
    }
    
    .timeline {
      position: relative;
      padding-left: 30px;
      border-left: 4px solid #16a34a;
    }

    .timeline-step {
      position: relative;
      margin-bottom: 2.5rem;
      padding-left: 40px;
    }

    .timeline-icon {
      position: absolute;
      left: -28px;
      top: 0;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.2rem;
      box-shadow: 0 0 0 3px #fff;
    }

    .timeline-content {
      background-color: #fff;
      padding: 1rem 1.5rem;
      border-radius: 0.75rem;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
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

  <section class="fitur-section py-5" style="background: linear-gradient(to bottom, #f0fdf4, #ffffff);">
  <div class="container">
    <h2 class="text-center mb-4 text-success fw-bold" data-aos="fade-up">🌟 Fitur Unggulan KuyHijrah</h2>
    <div class="row g-4 justify-content-center">
      
      <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="card h-100 border-0 shadow-sm fitur-card text-center p-4">
          <div class="fs-1 mb-3">📖</div>
          <h5 class="text-success">Baca Al-Qur’an</h5>
          <p class="text-muted">Mushaf digital interaktif untuk pengalaman membaca yang nyaman.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="card h-100 border-0 shadow-sm fitur-card text-center p-4">
          <div class="fs-1 mb-3">🕌</div>
          <h5 class="text-success">Jadwal Sholat</h5>
          <p class="text-muted">Waktu sholat real-time berdasarkan lokasi pengguna.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="card h-100 border-0 shadow-sm fitur-card text-center p-4">
          <div class="fs-1 mb-3">📰</div>
          <h5 class="text-success">Berita Islami</h5>
          <p class="text-muted">Update berita Islami terpercaya & bermanfaat setiap hari.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="card h-100 border-0 shadow-sm fitur-card text-center p-4">
          <div class="fs-1 mb-3">🤖</div>
          <h5 class="text-success">Chatbot KuyBot</h5>
          <p class="text-muted">Asisten Islami cerdas yang siap membantu pertanyaan hijrah Anda.</p>
        </div>
      </div>

      <div class="col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="500">
        <div class="card h-100 border-0 shadow-sm fitur-card text-center p-4">
          <div class="fs-1 mb-3">💡</div>
          <h5 class="text-success">Tips & Artikel Hijrah</h5>
          <p class="text-muted">Kumpulan artikel inspiratif untuk memperkuat semangat hijrah.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="quote-section py-5">
  <div class="container">
    <div class="text-center mb-4" data-aos="fade-down">
      <h2 class="text-success fw-bold">📿 Quote Islami Harian</h2>
      <p class="text-muted fst-italic">Kata-kata yang menginspirasi setiap langkah hijrahmu</p>
    </div>

    <div class="quote-card shadow p-4 rounded-4 text-center mx-auto" style="max-width: 700px;" data-aos="fade-up">
      <blockquote class="mb-3" id="quote-text" style="font-size: 1.25rem; font-family: 'Amiri', serif;">
        “Sesungguhnya setelah kesulitan itu ada kemudahan.” (Q.S. Al-Insyirah: 6)
      </blockquote>
      <cite class="d-block text-success fw-semibold" id="quote-source">— Al-Qur'an</cite>
    </div>
  </div>
</section>

<section class="timeline-section py-5">
  <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <h2 class="text-success fw-bold">🛤️ Garis Waktu Hijrah</h2>
      <p class="text-muted">Langkah sederhana untuk perjalanan hijrahmu</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="timeline">
          <!-- Step 1 -->
          <div class="timeline-step" data-aos="fade-right">
            <div class="timeline-icon bg-success text-white"><i class="bi bi-lightbulb"></i></div>
            <div class="timeline-content">
              <h5 class="fw-bold text-success">1. Mulai</h5>
              <p class="text-muted">Niatkan hijrah dari hati dan mulai dengan hal kecil, seperti memperbaiki shalat.</p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="timeline-step" data-aos="fade-left">
            <div class="timeline-icon bg-success text-white"><i class="bi bi-person-check-fill"></i></div>
            <div class="timeline-content">
              <h5 class="fw-bold text-success">2. Ikuti</h5>
              <p class="text-muted">Gabung komunitas hijrah, ikuti kajian, dan terus belajar hal-hal baik.</p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="timeline-step" data-aos="fade-right">
            <div class="timeline-icon bg-success text-white"><i class="bi bi-shield-lock-fill"></i></div>
            <div class="timeline-content">
              <h5 class="fw-bold text-success">3. Istiqomah</h5>
              <p class="text-muted">Terus istiqomah walau ada tantangan. KuyHijrah akan selalu menemani!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
  const quotes = [
    {
      text: "“Sesungguhnya setelah kesulitan itu ada kemudahan.”",
      source: "Q.S. Al-Insyirah: 6"
    },
    {
      text: "“Barang siapa yang menempuh jalan untuk mencari ilmu, maka Allah akan mudahkan baginya jalan menuju surga.”",
      source: "HR. Muslim"
    },
    {
      text: "“Jangan meremehkan kebaikan sekecil apapun.”",
      source: "HR. Muslim"
    },
    {
      text: "“Hidupkan hatimu dengan tadabbur Al-Qur'an.”",
      source: "Imam Ibnul Qayyim"
    },
    {
      text: "“Orang paling baik di antara kalian adalah yang belajar dan mengajarkan Al-Qur'an.”",
      source: "HR. Bukhari"
    }
  ];

  function showRandomQuote() {
    const quote = quotes[Math.floor(Math.random() * quotes.length)];
    document.getElementById('quote-text').innerText = quote.text;
    document.getElementById('quote-source').innerText = `— ${quote.source}`;
  }

  document.addEventListener("DOMContentLoaded", showRandomQuote);
</script>

@endsection
