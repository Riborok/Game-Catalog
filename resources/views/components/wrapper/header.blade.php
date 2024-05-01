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
            <a href="#" id="profile-avatar-link" data-bs-toggle="dropdown">
                <div id="profile-avatar-circle">
                    <object id="profile-avatar-obj" data="{{ asset('/profile-avatar.svg') }}" type="image/svg+xml"></object>
                </div>
            </a>

            <ul class="dropdown-menu text-bg-dark">
                @if (Auth::check())
                    <li><a class="dropdown-item" href="{{ route('profile') }}">@lang('title.profile')</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout.request') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">@lang('element.logout')</button>
                        </form>
                    </li>
                @else
                    <li><a class="dropdown-item" href="{{ route('register') }}">@lang('title.register')</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="{{ route('login') }}">@lang('title.login')</a></li>
                @endif
            </ul>
        </div>
    </div>

    <script src="{{ asset('/js/profile-avatar.js') }}" defer></script>
</header>
