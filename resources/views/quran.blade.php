@extends('layouts.main')

@section('container')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap');

  .quran-section {
    /* background: linear-gradient(to bottom, #ecfdf5, #ffffff); */
    background: linear-gradient(to bottom right, #dcfce7, #f0fdf4);
    padding: 6rem 1.25rem;
    font-family: 'Tajawal', sans-serif;
  }

  .surah-card {
    transition: transform .2s, box-shadow .2s;
  }

  .surah-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(22, 101, 52, 0.2);
  }

  .surah-number {
    background: #16a34a;
    color: #fff;
    font-weight: 700;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
  }

  .surah-name {
    font-size: 1.2rem;
    color: #166534;
    font-weight: 600;
  }

  .surah-meta {
    font-size: 0.9rem;
    color: #4b5563;
  }

  .search-box {
    max-width: 400px;
    margin: 0 auto 2.5rem auto;
  }

  .search-box input {
    border: 2px solid #16a34a;
    border-radius: 25px;
    padding: 0.6rem 1.2rem;
    font-family: 'Tajawal', sans-serif;
  }

  .filter-btn.active {
    background-color: #16a34a;
    color: white !important;
    border-color: #16a34a;
  }

  .badge.bg-success {
    background-color: #16a34a !important;
    font-size: 0.75rem;
    font-weight: 500;
  }

  @media (max-width: 576px) {
    .surah-name {
      font-size: 1rem;
    }
  }
</style>

<section class="quran-section">
  <div class="container">
    <h1 class="text-center mb-4 fw-bold" style="color:#166534;">📖 Al‑Qur’an Digital</h1>
    <p class="text-center text-muted mb-5">Temukan, baca, dan renungkan ayat-ayat suci dengan mudah dan nyaman.</p>

    {{-- Search --}}
    <div class="search-box text-center">
      <input type="text" id="searchInput" class="form-control" placeholder="🔍 Cari surah...">
    </div>

    {{-- Filter --}}
    <div class="text-center mb-4">
      <button class="btn btn-outline-success mx-1 filter-btn active" data-filter="all">Semua</button>
      <button class="btn btn-outline-success mx-1 filter-btn" data-filter="Mekah">Makkiyah</button>
      <button class="btn btn-outline-success mx-1 filter-btn" data-filter="Madinah">Madaniyah</button>
    </div>

    {{-- Terakhir dibaca --}}
    <div class="text-center mb-3" id="lastReadBox" style="display: none;">
      <a href="#" id="lastReadLink" class="btn btn-success rounded-pill px-4">📖 Lanjutkan terakhir dibaca</a>
    </div>

    <div class="row g-4" id="surahList">
      @foreach($surahs as $s)
        <div class="col-md-4 surah-item">
          <a href="/quran/{{ $s->nomor }}" class="text-decoration-none">
            <div class="card surah-card border-0 shadow-sm p-3 d-flex align-items-center">
              <div class="surah-number">{{ $s->nomor }}</div>
              <div>
                <div class="surah-name">
                  {{ $s->namaLatin }}
                  @if(in_array($s->nomor, [1, 18, 36]))
                    <span class="badge bg-success ms-2">✨ Populer</span>
                  @endif
                </div>
                <div class="surah-meta">{{ $s->tempatTurun }} • {{ $s->jumlahAyat }} ayat</div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    // Simpan terakhir dibaca
    const lastSurah = localStorage.getItem("lastReadSurah");
    if (lastSurah) {
      document.getElementById("lastReadBox").style.display = "block";
      document.getElementById("lastReadLink").href = `/quran/${lastSurah}`;
    }

    // Search
    const searchInput = document.getElementById('searchInput');
    const surahItems = document.querySelectorAll('.surah-item');

    searchInput.addEventListener('input', function () {
      const keyword = this.value.toLowerCase();
      surahItems.forEach(item => {
        const name = item.querySelector('.surah-name').textContent.toLowerCase();
        if (name.includes(keyword)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });

    // Filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const type = btn.getAttribute('data-filter');

        // aktifkan tombol
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // filter isi
        surahItems.forEach(item => {
          const desc = item.querySelector('.surah-meta').textContent;
          if (type === 'all' || desc.includes(type)) {
            item.style.display = 'block';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  });
</script>
@endsection
