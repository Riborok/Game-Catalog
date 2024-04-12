@extends('layouts.authorization')

@section('title')
    @lang('title.forgot-password')
@endsection

@section('authorization-content')
    <x-session-alert-message sessionName="success"/>

    <form method="POST" action="{{ route('forgot.password.request') }}">
        @csrf
        @include('components.inputs.input-email')
        <button type="submit" class="btn btn-primary">@lang('element.send-reset-link')</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">@lang('title.login')</a>
    </form>
@endsection
