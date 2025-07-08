@extends('layouts.main')

@section('container')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Tajawal:wght@500;700&display=swap');

    .about-section {
      /* background: linear-gradient(to bottom, #fefce8, #ecfdf5); */
      background: linear-gradient(to bottom right, #e8f5e9, #f0fdf4);
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
      /* color: #16a34a; */
      color: #15803d;
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

    .why-box {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.03);
      margin-top: 60px;
    }

    .why-box h4 {
      color: #166534;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .why-box p {
      color: #4b5563;
      margin-bottom: 0.8rem;
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

    .team-title {
      font-size: 1.8rem;
      font-weight: 600;
      color: #166534;
      margin-bottom: 30px;
    }

    .team-zigzag {
      max-width: 850px;
      margin: 0 auto;
    }

    .team-block {
      display: flex;
      align-items: center;
      margin-bottom: 50px;
      gap: 24px;
    }

    .team-block.reverse {
      flex-direction: row-reverse;
    }

    .team-photo-lg {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      flex-shrink: 0;
    }

    .team-info {
      flex: 1;
      text-align: left;
    }

    .team-info h5 {
      font-size: 1.3rem;
      font-weight: 600;
      color: #166534;
      margin-bottom: 5px;
    }

    .team-info small {
      color: #6b7280;
      font-size: 0.95rem;
      display: block;
      margin-bottom: 10px;
    }

    .team-info p {
      color: #4b5563;
      font-size: 0.95rem;
      margin: 0;
    }

    .carousel {
      overflow-x: hidden;
      position: relative;
      padding-bottom: 3rem; /* Tambahan untuk mencegah pemotongan */
    }

    .carousel-track {
      display: flex;
      gap: 1.25rem;
      animation: slide-left 40s linear infinite;
    }


    @keyframes slide-left {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-100%);
      }
    }

    .testimonial-card {
      flex: 0 0 280px;
      min-height: 380px;
      background: linear-gradient(to bottom, #ffffff, #f0fdf4);
      border-radius: 1rem;
      padding: 1.5rem 1.2rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.045);
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.3s ease;
      box-sizing: border-box;
    }

    .testimonial-card:hover {
      transform: scale(1.03);
    }

    .testimonial-img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      margin: 0 auto 1rem auto;
      border: 3px solid #16a34a30;
    }

    .testimonial-text {
      font-style: italic;
      color: #4b5563;
      font-size: 0.95rem;
      margin-bottom: 0.75rem;
      line-height: 1.5;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .testimonial-name {
      font-weight: 700;
      font-family: 'Tajawal', sans-serif;
      color: #166534;
      font-size: 1.05rem;
    }

    .testimonial-role {
      font-size: 0.85rem;
      color: #6b7280;
    }

    @media (max-width: 768px) {
      .about-title {
        font-size: 2rem;
      }

      .feature-box {
        flex-direction: column;
        align-items: flex-start !important;
      }

      .team-block,
      .team-block.reverse {
        flex-direction: column !important;
        text-align: center;
      }

      .team-info {
        text-align: center;
      }

      .team-photo-lg {
        width: 120px;
        height: 120px;
      }

      .carousel-track {
        animation-duration: 60s;
      }

      .testimonial-card {
        flex: 0 0 240px;
        min-height: 340px;
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
      {{-- Fitur-Fitur --}}
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

    {{-- Kenapa KuyHijrah --}}
    <div class="why-box" data-aos="zoom-in" data-aos-delay="350" style="max-width: 850px; margin: 0 auto;">
      <h4 class="text-center mb-4">📌 Kenapa Memilih <span class="about-highlight">KuyHijrah?</span></h4>
      <p><strong>✅ Fokus Islami:</strong> Semua fitur dirancang untuk membantu perjalanan hijrah secara syar'i dan relevan.</p>
      <p><strong>✅ Teknologi Modern:</strong> Menggunakan stack terbaru untuk kenyamanan dan kecepatan akses pengguna.</p>
      <p><strong>✅ Komitmen Jangka Panjang:</strong> Kami berkomitmen untuk terus menambah fitur Islami yang edukatif dan inspiratif.</p>
    </div>

    {{-- Misi & Nilai --}}
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

    {{-- Tim KuyHijrah --}}
    <div class="mt-5" data-aos="fade-up" data-aos-delay="500">
      <h2 class="team-title">🤝 Tim di Balik KuyHijrah</h2>
      <div class="team-zigzag">
        {{-- Hilmy - Backend --}}
        <div class="team-block" data-aos="fade-right">
          <img src="{{ asset('storage/team-images/hilmy-hafizh.jpg') }}" alt="Muhammad Hilmy Hafizh" class="team-photo-lg">
          <div class="team-info">
            <h5>Muhammad Hilmy Hafizh</h5>
            <small>Backend Developer</small>
            <p>Mengembangkan dan mengelola sistem backend KuyHijrah, termasuk database, API, dan keamanan data pengguna.</p>
          </div>
        </div>

        {{-- Adam - Frontend --}}
        <div class="team-block reverse" data-aos="fade-left">
          <img src="{{ asset('storage/team-images/adam-nur-zidane.jpg') }}" alt="Adam Nur Zidane" class="team-photo-lg">
          <div class="team-info">
            <h5>Adam Nur Zidane</h5>
            <small>Frontend Developer</small>
            <p>Bertanggung jawab atas desain antarmuka dan implementasi UI yang responsif dan ramah pengguna di semua perangkat.</p>
          </div>
        </div>

        {{-- Arya - PM --}}
        <div class="team-block" data-aos="fade-right">
          <img src="{{ asset('storage/team-images/arya-suprobo.jpg') }}" alt="Arya Suprobo" class="team-photo-lg">
          <div class="team-info">
            <h5>Arya Suprobo</h5>
            <small>Project Manager</small>
            <p>Mengelola alur kerja proyek, komunikasi tim, dan memastikan setiap fitur berjalan sesuai visi misi KuyHijrah.</p>
          </div>
        </div>
      </div>
    </div>

  {{-- Carousel Testimoni --}}
    <div class="container mt-5">
      <h2 class="about-title mb-4">Apa Kata Mereka?</h2>
      <div class="carousel">
        <div class="carousel-track" id="carouselTrack">
          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/zayn-malik.jpg') }}" class="testimonial-img" alt="Zayn Malik">
            <p class="testimonial-text">“KuyHijrah sangat membantu saya tetap terhubung dengan nilai-nilai Islam dalam kehidupan sehari-hari.”</p>
            <div class="testimonial-name">Zayn Malik</div>
            <div class="testimonial-role">Penyanyi Internasional</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/maher-zain.jpg') }}" class="testimonial-img" alt="Maher Zain">
            <p class="testimonial-text">“Aplikasi Islami terbaik! Membantu generasi muda untuk tetap istiqomah.”</p>
            <div class="testimonial-name">Maher Zain</div>
            <div class="testimonial-role">Musisi Muslim</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/elon-musk.jpg') }}" class="testimonial-img" alt="Elon Musk">
            <p class="testimonial-text">“Teknologi yang memadukan iman dan informasi sangat saya apresiasi.”</p>
            <div class="testimonial-name">Elon Musk</div>
            <div class="testimonial-role">CEO & Inovator</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/jeff-bezos.webp') }}" class="testimonial-img" alt="Jeff Bezos">
            <p class="testimonial-text">“Semangat spiritual dan teknologi berjalan berdampingan di KuyHijrah.”</p>
            <div class="testimonial-name">Jeff Bezos</div>
            <div class="testimonial-role">Pengusaha & Filantropis</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/yusuf-islam.jpg') }}" class="testimonial-img" alt="Yusuf Islam">
            <p class="testimonial-text">“KuyHijrah adalah jembatan spiritual bagi Muslim modern.”</p>
            <div class="testimonial-name">Yusuf Islam</div>
            <div class="testimonial-role">Mualaf & Musisi</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/khabib-nurmagomedov.jpg') }}" class="testimonial-img" alt="Khabib Nurmagomedov">
            <p class="testimonial-text">“Aplikasi ini membantu saya tetap istiqomah meski di tengah kesibukan.”</p>
            <div class="testimonial-name">Khabib Nurmagomedov</div>
            <div class="testimonial-role">Atlet & Ikon Muslim</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/malala-yousafzai.jpg') }}" class="testimonial-img" alt="Malala Yousafzai">
            <p class="testimonial-text">“KuyHijrah menginspirasi saya untuk tetap semangat dalam menuntut ilmu dan iman.”</p>
            <div class="testimonial-name">Malala Yousafzai</div>
            <div class="testimonial-role">Aktivis Pendidikan</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/mufti-menk.jpg') }}" class="testimonial-img" alt="Mufti Menk">
            <p class="testimonial-text">“Ini bukan sekadar aplikasi, ini sahabat dalam perjalanan hijrah.”</p>
            <div class="testimonial-name">Mufti Menk</div>
            <div class="testimonial-role">Ulama & Penceramah</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/habib-novel-alaydrus.jpg') }}" class="testimonial-img" alt="Habib Novel Alaydrus">
            <p class="testimonial-text">“Semoga KuyHijrah terus menjadi wasilah kebaikan umat.”</p>
            <div class="testimonial-name">Habib Novel Alaydrus</div>
            <div class="testimonial-role">Ulama Nusantara</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/sarah-al-amiri.jpg') }}" class="testimonial-img" alt="Sarah Al Amiri">
            <p class="testimonial-text">“KuyHijrah menunjukkan bahwa iman dan sains bisa berjalan bersama.”</p>
            <div class="testimonial-name">Sarah Al Amiri</div>
            <div class="testimonial-role">Ilmuwan & Menteri UAE</div>
          </div>
          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/zayn-malik.jpg') }}" class="testimonial-img" alt="Zayn Malik">
            <p class="testimonial-text">“KuyHijrah sangat membantu saya tetap terhubung dengan nilai-nilai Islam dalam kehidupan sehari-hari.”</p>
            <div class="testimonial-name">Zayn Malik</div>
            <div class="testimonial-role">Penyanyi Internasional</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/maher-zain.jpg') }}" class="testimonial-img" alt="Maher Zain">
            <p class="testimonial-text">“Aplikasi Islami terbaik! Membantu generasi muda untuk tetap istiqomah.”</p>
            <div class="testimonial-name">Maher Zain</div>
            <div class="testimonial-role">Musisi Muslim</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/elon-musk.jpg') }}" class="testimonial-img" alt="Elon Musk">
            <p class="testimonial-text">“Teknologi yang memadukan iman dan informasi sangat saya apresiasi.”</p>
            <div class="testimonial-name">Elon Musk</div>
            <div class="testimonial-role">CEO & Inovator</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/jeff-bezos.webp') }}" class="testimonial-img" alt="Jeff Bezos">
            <p class="testimonial-text">“Semangat spiritual dan teknologi berjalan berdampingan di KuyHijrah.”</p>
            <div class="testimonial-name">Jeff Bezos</div>
            <div class="testimonial-role">Pengusaha & Filantropis</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/yusuf-islam.jpg') }}" class="testimonial-img" alt="Yusuf Islam">
            <p class="testimonial-text">“KuyHijrah adalah jembatan spiritual bagi Muslim modern.”</p>
            <div class="testimonial-name">Yusuf Islam</div>
            <div class="testimonial-role">Mualaf & Musisi</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/khabib-nurmagomedov.jpg') }}" class="testimonial-img" alt="Khabib Nurmagomedov">
            <p class="testimonial-text">“Aplikasi ini membantu saya tetap istiqomah meski di tengah kesibukan.”</p>
            <div class="testimonial-name">Khabib Nurmagomedov</div>
            <div class="testimonial-role">Atlet & Ikon Muslim</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/malala-yousafzai.jpg') }}" class="testimonial-img" alt="Malala Yousafzai">
            <p class="testimonial-text">“KuyHijrah menginspirasi saya untuk tetap semangat dalam menuntut ilmu dan iman.”</p>
            <div class="testimonial-name">Malala Yousafzai</div>
            <div class="testimonial-role">Aktivis Pendidikan</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/mufti-menk.jpg') }}" class="testimonial-img" alt="Mufti Menk">
            <p class="testimonial-text">“Ini bukan sekadar aplikasi, ini sahabat dalam perjalanan hijrah.”</p>
            <div class="testimonial-name">Mufti Menk</div>
            <div class="testimonial-role">Ulama & Penceramah</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/habib-novel-alaydrus.jpg') }}" class="testimonial-img" alt="Habib Novel Alaydrus">
            <p class="testimonial-text">“Semoga KuyHijrah terus menjadi wasilah kebaikan umat.”</p>
            <div class="testimonial-name">Habib Novel Alaydrus</div>
            <div class="testimonial-role">Ulama Nusantara</div>
          </div>

          <div class="testimonial-card">
            <img src="{{ asset('storage/testimonial-images/sarah-al-amiri.jpg') }}" class="testimonial-img" alt="Sarah Al Amiri">
            <p class="testimonial-text">“KuyHijrah menunjukkan bahwa iman dan sains bisa berjalan bersama.”</p>
            <div class="testimonial-name">Sarah Al Amiri</div>
            <div class="testimonial-role">Ilmuwan & Menteri UAE</div>
          </div>
        </div>

      </div>
    </div>

    {{-- CTA Donasi --}}
    <div class="container my-5 py-5 px-4 rounded-4" style="background-color: #f0fdf4;" data-aos="zoom-in-up">
      <div class="row align-items-center">
        <div class="col-md-8 text-md-start text-center mb-3 mb-md-0">
          <h4 class="fw-bold text-success">Dukung Perjalanan Hijrah Umat</h4>
          <p class="mb-0 text-muted">Kontribusi Anda membantu kami menghadirkan lebih banyak fitur Islami yang bermanfaat dan gratis untuk semua.</p>
        </div>
        <div class="col-md-4 text-md-end text-center">
          <a href="#" class="btn btn-success btn-lg rounded-pill shadow">Donasi Sekarang</a>
        </div>
      </div>
    </div>

    {{-- CTA Komunitas --}}
    <div class="container mb-5 py-5 px-4 rounded-4" style="background-color: #ecfdf5;" data-aos="fade-up">
      <div class="text-center">
        <h4 class="fw-bold text-success">Gabung Komunitas Hijrah</h4>
        <p class="text-muted">Mari bertumbuh bersama! Dapatkan update kajian, konten eksklusif, dan ruang diskusi Islami dengan bergabung ke komunitas kami.</p>
        <a href="#" class="btn btn-outline-success rounded-pill px-4">Gabung Sekarang</a>
      </div>
    </div>

  </section>

  {{-- AOS init --}}
  <script>
    AOS.init();
  </script>
@endsection
