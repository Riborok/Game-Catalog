@extends('layouts.authorization')

@section('title')
    Login
@endsection

@section('authorization-content')
    <x-session-alert-message sessionName="success"/>
    <form method="POST" action="{{ route('login.request') }}">
        @csrf

        @include('components.inputs.input-email')
        @include('components.inputs.input-password')

        <div class="d-flex justify-content-between align-items-center">
            @include('components.inputs.input-remember')
            <a href="{{ route('forgot.password') }}" class="text-decoration-none text-info font-weight-bold">Forgot your password?</a>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    </form>
@endsection
