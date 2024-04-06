<header class="p-3 text-bg-dark">
    <div class="container d-flex flex-wrap align-items-center justify-content-center">
        <ul class="nav me-auto mb-2 justify-content-center mb-md-0 flex-wrap">
            <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
            <li><a href="{{ route('catalog') }}" class="nav-link">Catalog</a></li>
            <li><a href="{{ route('todays-calendar') }}" class="nav-link">Calendar</a></li>
            <li><a href="{{ route('visited-pages') }}" class="nav-link">Visited Pages</a></li>
        </ul>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" onmouseover="playGif()" onmouseout="stopGif()">
                <img id="profile-avatar" src="{{ asset('/profile-avatar.png') }}" alt="user">
            </a>

            <ul class="dropdown-menu text-bg-dark">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout.request') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
