@extends('layouts.authorization')

@section('title')
    @lang('title.register')
@endsection

@section('authorization-content')
    <form method="POST" action="{{ route('register.request') }}">
        @csrf

        @include('components.inputs.input-name')
        @include('components.inputs.input-email')
        @include('components.inputs.input-password')
        @include('components.inputs.input-password-confirm')
        @include('components.inputs.input-remember')

        <button type="submit" class="btn btn-primary">@lang('title.register')</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">@lang('title.login')</a>
    </form>
@endsection
