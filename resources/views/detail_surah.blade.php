@extends('layouts.main')

@section('container')
<style>
  .detail-quran {
    background: #f9faf8;
    padding: 6rem 1.25rem;
    font-family: 'Tajawal', sans-serif;
  }

  .ayat {
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: background-color 0.3s;
  }

  .ayat.playing {
    background-color: #ecfdf5;
    border-left: 5px solid #16a34a;
  }

  .arabic {
    font-size: 1.5rem;
    color: #166534;
    text-align: right;
  }

  .latin {
    font-size: 1rem;
    color: #4b5563;
    font-style: italic;
  }

  .idn {
    font-size: 1rem;
    color: #374151;
    margin-top: 0.5rem;
  }

  .audio-controls {
    margin-top: 0.5rem;
  }

  #backToTop {
    position: fixed;
    bottom: 30px;
    right: 30px;
    display: none;
    z-index: 1000;
  }
</style>

<div class="detail-quran">
  <div class="container">
    <h2 class="text-center text-success fw-bold mb-3">{{ $surah->namaLatin }} ({{ $surah->nama }}) 🌙</h2>
    <p class="text-center text-muted">{{ $surah->tempatTurun }} • {{ $surah->jumlahAyat }} ayat • Artinya: "{{ $surah->arti }}"</p>

    <div class="text-center mb-4">
      <button id="playAllBtn" class="btn btn-success rounded-pill px-4">
        ▶️ Putar Semua Ayat
      </button>
    </div>

    <div class="text-center mb-4">
      <div id="ayatStatus" class="text-muted mb-1">Belum diputar</div>
      <div class="progress" style="height: 8px; max-width: 500px; margin: 0 auto;">
        <div id="progressBar" class="progress-bar bg-success" style="width: 0%"></div>
      </div>
    </div>

    @foreach($surah->ayat as $ayat)
    <div class="ayat" id="ayat-{{ $ayat['nomorAyat'] }}" data-ayat="{{ $ayat['nomorAyat'] }}">
      <div class="d-flex justify-content-between align-items-start">
        <div style="flex: 1">
          <div class="arabic">{{ $ayat['teksArab'] }}</div>
          <div class="latin">{{ $ayat['teksLatin'] }}</div>
          <div class="idn">{{ $ayat['teksIndonesia'] }}</div>
        </div>
        <button class="btn btn-sm btn-outline-success bookmark-btn ms-3" title="Bookmark Ayat">📌</button>
      </div>
      <audio controls class="audio-controls w-100 mt-2">
        <source src="{{ $ayat['audio']['01'] ?? $ayat['audio'] }}" type="audio/mp3">
      </audio>
    </div>
    @endforeach

    <a href="/quran" class="btn btn-outline-success mt-4 rounded-pill px-4">← Kembali ke Daftar Surah</a>
  </div>
</div>

<button id="backToTop" class="btn btn-success rounded-circle">↑</button>

<script>
  localStorage.setItem("lastReadSurah", {{ $surah->nomor }});

  const currentSurah = {{ $surah->nomor }};
  const bookmarkBtns = document.querySelectorAll('.bookmark-btn');
  const allAudio = document.querySelectorAll('audio');
  const allAyat = document.querySelectorAll('.ayat');
  const playAllBtn = document.getElementById('playAllBtn');
  let currentPlayIndex = 0;
  let isAutoPlaying = false;

  // Bookmark logic
  bookmarkBtns.forEach(btn => {
    const ayatNumber = btn.closest('.ayat').getAttribute('data-ayat');
    const bookmarkKey = `bookmark-${currentSurah}-${ayatNumber}`;

    if (localStorage.getItem(bookmarkKey)) {
      btn.classList.remove('btn-outline-success');
      btn.classList.add('btn-success');
      btn.innerHTML = '✅';
    }

    btn.addEventListener('click', () => {
      if (localStorage.getItem(bookmarkKey)) {
        localStorage.removeItem(bookmarkKey);
        btn.classList.remove('btn-success');
        btn.classList.add('btn-outline-success');
        btn.innerHTML = '📌';
      } else {
        localStorage.setItem(bookmarkKey, 'bookmarked');
        btn.classList.remove('btn-outline-success');
        btn.classList.add('btn-success');
        btn.innerHTML = '✅';
      }
    });
  });

  // Highlight playing ayat
  function highlightAyat(index) {
    allAyat.forEach((el, i) => {
      el.classList.toggle('playing', i === index);
    });
  }

  // Pause other audios
  allAudio.forEach(audio => {
    audio.addEventListener('play', () => {
      allAudio.forEach(other => {
        if (other !== audio) other.pause();
      });
    });
  });

  // Auto play next
  allAudio.forEach((audio, index) => {
    audio.addEventListener('ended', () => {
      if (isAutoPlaying && allAudio[index + 1]) {
        currentPlayIndex = index + 1;
        highlightAyat(currentPlayIndex);
        allAudio[currentPlayIndex].play();
        allAudio[currentPlayIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });

    // Highlight saat manual play
    audio.addEventListener('play', () => {
      highlightAyat(index);
updateProgress(index);

    });
  });

  // Play all
  playAllBtn.addEventListener('click', () => {
    isAutoPlaying = true;
    currentPlayIndex = 0;
    updateProgress(currentPlayIndex);
    highlightAyat(currentPlayIndex);
    allAudio[currentPlayIndex].play();
    allAudio[currentPlayIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
  });

  // Back to top button
  const backBtn = document.getElementById('backToTop');
  window.addEventListener('scroll', () => {
    backBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
  });
  backBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  const ayatStatus = document.getElementById('ayatStatus');
const progressBar = document.getElementById('progressBar');

function updateProgress(index) {
  const total = allAudio.length;
  const percent = ((index + 1) / total) * 100;
  progressBar.style.width = percent + '%';
  ayatStatus.textContent = `Sedang memutar ayat ${index + 1} dari ${total}`;
}

</script>
@endsection
