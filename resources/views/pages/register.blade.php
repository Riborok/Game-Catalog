@extends('layouts.authorization')

@section('title')
    @lang('title.register')
@endsection

@section('authorization-content')
    <form method="POST" action="{{ route('register.request') }}">
        @csrf

        @include('components.input.name')
        @include('components.input.email')
        @include('components.input.password')
        @include('components.input.password-confirm')
        @include('components.input.remember')

        <button type="submit" class="btn btn-primary">@lang('title.register')</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">@lang('title.login')</a>
    </form>
@endsection
