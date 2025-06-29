<header class="navbar navbar-light sticky-top bg-white flex-md-nowrap p-2 shadow-sm border-bottom">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-white fw-semibold text-primary" href="#">
        Admin Panel
    </a>

    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <input class="form-control w-100 mx-3 rounded-pill border-primary-subtle" type="text" placeholder="Search..." aria-label="Search">

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post" class="mb-0">
                @csrf
                <button class="btn btn-outline-primary rounded-pill px-3 d-flex align-items-center gap-2" type="submit">
                    <span>Logout</span>
                    <span data-feather="log-out"></span>
                </button>
            </form>
        </div>
    </div>
</header>
