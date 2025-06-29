<style>
    .nav-link {
        color: #374151 !important; /* Tailwind gray-700 */
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        background-color: #f3f4f6;
        color: #0d6efd !important;
    }

    .nav-link.active {
        background-color: #e7f1ff;
        color: #0d6efd !important;
        border-left: 4px solid #0d6efd;
    }

    .nav-link.active span:not([data-feather]) {
        color: #0d6efd !important;
        font-weight: bold;
    }

    .sidebar .nav-link span[data-feather] {
        color: #6b7280 !important; /* Tailwind gray-500 */
    }

    .sidebar .nav-link.active span[data-feather] {
        color: #0d6efd !important;
    }
</style>

<div class="sidebar border-end col-md-3 col-lg-2 p-0 bg-white shadow-sm">
    <div class="offcanvas-md offcanvas-end bg-white" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title fw-bold text-primary" id="sidebarMenuLabel">Admin Panel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column px-3">
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}"
                        href="/dashboard">
                        <span data-feather="home"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/news*') ? 'active' : '' }}"
                        href="/dashboard/news">
                        <span data-feather="file-text"></span>
                        <span>News</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                        href="/dashboard/categories">
                        <span data-feather="grid"></span>
                        <span>News Categories</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
