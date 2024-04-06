@extends('layouts.authorization')

@section('title')
    Register
@endsection

@section('authorization-content')
    <form method="POST" action="{{ route('register.request') }}">
        @csrf

        @include('components.inputs.input-name')
        @include('components.inputs.input-email')
        @include('components.inputs.input-password')
        @include('components.inputs.input-password-confirm')
        @include('components.inputs.input-remember')

        <button type="submit" class="btn btn-primary">Register</button>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </form>
@endsection
