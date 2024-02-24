<header class="p-3 text-bg-dark">
    <div class="container d-flex flex-wrap align-items-center justify-content-center">
        <ul class="nav me-auto mb-2 justify-content-center mb-md-0 flex-wrap">
            <li><a href="#" class="nav-link px-2 fs-6">Home</a></li>
            <li><a href="#" class="nav-link px-2 fs-6">Features</a></li>
            <li><a href="#" class="nav-link px-2 fs-6">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 fs-6">FAQs</a></li>
            <li><a href="#" class="nav-link px-2 fs-6">About</a></li>
        </ul>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" onmouseover="playGif()" onmouseout="stopGif()">
                <img id="profile-avatar" src="{{ asset('/profile-avatar.png') }}" alt="user">
            </a>

            <ul class="dropdown-menu text-bg-dark">
                <li><a class="dropdown-item fs-6" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item fs-6" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</header>
