<footer class="p-3 text-bg-dark">
    <div class="container d-flex flex-wrap justify-content-between align-items-center py-2 my-1 border-top">
        <div class="d-flex">
            <img src="{{ asset('favicon.png') }}" alt="icon" width="22" height="22" class="ms-2">
            <span class="ms-4">© 2024 Riborok</span>
        </div>

        <div class="d-flex">
            <a class="me-3" href="{{route('redirect', ['url' => urlencode("https://github.com/Riborok")])}}" target="_blank">
                <img class="icon" src="{{ asset('/brands/github.svg') }}" alt="github">
            </a>
            <a class="me-2" href="{{route('redirect', ['url' => urlencode("https://t.me/egorpnkrtw")])}}" target="_blank">
                <img class="icon" src="{{ asset('/brands/telegram.svg') }}" alt="telegram">
            </a>
        </div>
    </div>
</footer>
