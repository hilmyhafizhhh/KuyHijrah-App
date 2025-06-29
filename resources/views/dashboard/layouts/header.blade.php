<header class="navbar sticky-top bg-dark flex-md-nowrap p-1 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">KuyHijrah</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <input type="text" class="form-control form-control-dark w-100 search-input" placeholder="Search"
        aria-label="Search">

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 border-0">
                    <span class="text-white-50">
                        Logout </span> <span class="text-white-50" data-feather="log-out"></span> </button>
            </form>
        </div>
    </div>
</header>