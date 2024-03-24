@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-bg-dark">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.register') }}">
                        @csrf

                        @include('components.inputs.input-name')
                        @include('components.inputs.input-email')
                        @include('components.inputs.input-password')
                        @include('components.inputs.input-password-confirm')
                        @include('components.inputs.input-remember')

                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
