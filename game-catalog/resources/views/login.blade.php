@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-bg-dark">Login</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.login') }}">
                        @csrf

                        @include('components.inputs.input-email')
                        @include('components.inputs.input-password')
                        @include('components.inputs.input-remember')

                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
