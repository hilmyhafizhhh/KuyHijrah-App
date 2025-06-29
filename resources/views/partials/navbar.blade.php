<style>
  @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500;700&display=swap');

  .navbar-custom {
    background: linear-gradient(to right, #d1fae5, #f0fdf4);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    padding: 1rem 0.5rem;
    font-family: 'Tajawal', sans-serif;
    z-index: 1030;
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 1.8rem;
    color: #15803d !important;
    letter-spacing: -0.5px;
  }

  .navbar-nav .nav-link {
    font-weight: 500;
    font-size: 1.05rem; /* Tambahan ini */
    color: #166534 !important;
    padding: 0.6rem 1rem;
    border-radius: 8px;
    transition: all 0.25s ease;
  }

  .navbar-nav .nav-link:hover {
    color: #15803d !important;
    background-color: rgba(22, 101, 52, 0.07);
  }

  .navbar-nav .nav-link.active {
    background-color: #d1fae5;
    color: #15803d !important;
    font-weight: 600;
    border-radius: 8px;
  }

  .navbar-toggler {
    border: none;
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28102, 163, 101, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }

  body {
    background-color: #f9fafb;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
  <div class="container px-3">
    <a class="navbar-brand d-flex align-items-center" href="/">KuyHijrah<span class="text-success">.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('quran') ? 'active' : '' }}" href="/quran">Al‑Qur’an</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('news') ? 'active' : '' }}" href="/news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Category</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
