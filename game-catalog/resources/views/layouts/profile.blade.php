@extends('layouts.app')

@section('title')
    Profile {{ $user->name }}
@endsection

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-bg-dark nav">
                    <a href="{{ route('profile') }}" class="nav-link">Profile</a>
                    @if($user->admin)
                        <a href="{{ route('admin') }}" class="nav-link">Admin Panel</a>
                    @endif
                </div>
                <div class="card-body">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
@endsection
