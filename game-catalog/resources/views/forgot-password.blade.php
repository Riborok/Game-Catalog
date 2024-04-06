@extends('layouts.authorization')

@section('title')
    Forgot Password
@endsection

@section('authorization-content')
    <x-session-alert-message sessionName="success"/>

    <form method="POST" action="{{ route('forgot.password.request') }}">
        @csrf
        @include('components.inputs.input-email')
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </form>
@endsection
