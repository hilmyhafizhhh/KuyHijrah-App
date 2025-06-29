@extends('layouts.main')

@section('container')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Tajawal:wght@500;700&display=swap');

    .about-section {
      background: linear-gradient(to bottom, #fefce8, #ecfdf5);
      padding: 100px 20px;
      font-family: 'Inter', sans-serif;
      color: #166534;
    }

    .about-title {
      font-family: 'Tajawal', sans-serif;
      font-size: 2.8rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: #166534;
    }

    .about-highlight {
      color: #16a34a;
    }

    .about-subtitle {
      font-size: 1.15rem;
      color: #4b5563;
      max-width: 760px;
      margin: 0 auto 2.5rem auto;
    }

    .feature-box {
      background-color: #ffffff;
      border-left: 4px solid #16a34a;
      padding: 18px 22px;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.035);
      margin-bottom: 20px;
      transition: transform 0.3s ease;
    }

    .feature-box:hover {
      transform: scale(1.015);
    }

    .feature-icon {
      font-size: 1.7rem;
      margin-right: 12px;
      color: #16a34a;
    }

    .mission-box {
      background-color: #f0fdf4;
      padding: 30px;
      border-radius: 12px;
      margin-top: 50px;
    }

    .value-list li {
      margin-bottom: 10px;
    }

    @media (max-width: 768px) {
      .about-title {
        font-size: 2rem;
      }

      .feature-box {
        flex-direction: column;
        align-items: flex-start !important;
      }
    }
  </style>

  <section class="about-section text-center">
    <h1 class="about-title" data-aos="fade-down" data-aos-duration="1000">
      Tentang <span class="about-highlight">KuyHijrah</span>
    </h1>
    <p class="about-subtitle" data-aos="fade-up" data-aos-duration="1200">
      Teknologi hanyalah sarana. KuyHijrah hadir untuk membantu Anda menapaki jalan hijrah dengan fitur digital yang bermanfaat dan bernilai Islami.
    </p>

    <div class="mt-4 w-100" style="max-width: 850px; margin: 0 auto;">
      <div class="feature-box d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
        <div class="feature-icon">
          <i class="fas fa-book-open"></i>
        </div>
        <div>
          <h5 class="fw-bold mb-1">Al-Qur’an Interaktif</h5>
          <p class="mb-0 text-muted">Baca dan dengarkan ayat suci dengan tampilan yang nyaman dan rapi.</p>
        </div>
      </div>

      <div class="feature-box d-flex align-items-center" data-aos="fade-right" data-aos-delay="200">
        <div class="feature-icon">
          <i class="fas fa-mosque"></i>
        </div>
        <div>
          <h5 class="fw-bold mb-1">Jadwal Sholat Otomatis</h5>
          <p class="mb-0 text-muted">Waktu sholat harian yang akurat sesuai lokasi Anda secara real-time.</p>
        </div>
      </div>

      <div class="feature-box d-flex align-items-center" data-aos="fade-right" data-aos-delay="300">
        <div class="feature-icon">
          <i class="fas fa-newspaper"></i>
        </div>
        <div>
          <h5 class="fw-bold mb-1">Berita Islami</h5>
          <p class="mb-0 text-muted">Berita dan inspirasi dari dunia Islam yang memperkuat iman dan wawasan.</p>
        </div>
      </div>
    </div>

    <div class="mission-box text-start mt-5" data-aos="fade-up" data-aos-delay="400" style="max-width: 850px; margin: 0 auto;">
      <h4 class="fw-bold mb-3">🎯 Misi Kami</h4>
      <p class="text-muted">
        Menjadi sahabat digital umat Muslim — menghadirkan solusi Islami yang praktis, informatif, dan terpercaya dalam genggaman. KuyHijrah ingin menemani langkah hijrah Anda, dari hati, melalui teknologi.
      </p>

      <h4 class="fw-bold mt-4 mb-3">🌱 Nilai-Nilai Kami</h4>
      <ul class="text-muted value-list">
        <li>✅ <strong>Amanah</strong> — Memberikan informasi dan fitur yang dapat dipercaya</li>
        <li>✅ <strong>Manfaat</strong> — Setiap fitur punya nilai dan tujuan kebaikan</li>
        <li>✅ <strong>Kesederhanaan</strong> — Desain yang ramah dan mudah digunakan</li>
        <li>✅ <strong>Keterbukaan</strong> — Terbuka terhadap saran dan kontribusi umat</li>
      </ul>
    </div>
  </section>
@endsection
