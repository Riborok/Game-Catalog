<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <!-- Bootstrap -->

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="{{ asset('/js/all.js') }}" defer></script>
</head>
<body>
    @include('inc.header')
    <div class="container">
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('inc.footer')
</body>
</html>
