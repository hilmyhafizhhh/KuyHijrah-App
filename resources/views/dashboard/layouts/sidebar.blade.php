<style>
    /* Mengubah warna default teks menjadi hitam */
    .nav-link {
        color: black !important;
    }

    /* Mengubah warna teks menjadi biru saat active */
    .nav-link.active span:not([data-feather]) {
        color: #0d6efd !important;
    }
</style>

<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}"
                        aria-current="page" href="/dashboard">
                        <span data-feather="home" class="text-dark"></span>
                        <span class="active-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/news*') ? 'active' : '' }}"
                        href="/dashboard/news">
                        <span data-feather="file-text" class="text-dark"></span>
                        <span>News</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>