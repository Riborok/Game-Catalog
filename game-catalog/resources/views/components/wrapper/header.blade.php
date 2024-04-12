<header class="p-3 text-bg-dark">
    <div class="container d-flex flex-wrap align-items-center justify-content-center">
        <ul class="nav me-auto mb-2 justify-content-center mb-md-0 flex-wrap">
            <li><a href="{{ route('home') }}" class="nav-link">@lang('title.home')</a></li>
            <li><a href="{{ route('catalog') }}" class="nav-link">@lang('title.catalog')</a></li>
            <li><a href="{{ route('todays-calendar') }}" class="nav-link">@lang('title.calendar')</a></li>
            <li><a href="{{ route('visited-pages') }}" class="nav-link">@lang('title.visited-pages')</a></li>

            <li class="dropdown d-flex align-items-center ms-3">
                <a href="#" class="d-block link-body-emphasis text-decoration-none" data-bs-toggle="dropdown">
                    <img class="icon" src="{{ asset('/language.svg') }}" alt="language">
                </a>

                <ul class="dropdown-menu text-bg-dark">
                    <li>
                        <a class="dropdown-item" href="{{ route('change-language', 'en') }}">English</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('change-language', 'ru') }}">Русский</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="dropdown text-end">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" onmouseover="playGif()" onmouseout="stopGif()">
                <img id="profile-avatar" src="{{ asset('/profile-avatar.png') }}" alt="user">
            </a>

            <ul class="dropdown-menu text-bg-dark">
                <li><a class="dropdown-item" href="{{ route('profile') }}">@lang('title.profile')</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout.request') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">@lang('element.logout')</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
