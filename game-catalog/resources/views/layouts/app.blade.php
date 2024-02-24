<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
@include('components.header')
<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>
@include('components.footer')
</body>
</html>
