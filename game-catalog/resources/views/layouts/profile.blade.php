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
                    @if ($user->admin)
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                Admin Panel
                            </a>
                            <ul class="dropdown-menu text-bg-dark">
                                <li><a class="dropdown-item" href="{{ route('user-administration') }}">User Administration</a></li>
                                <li><a class="dropdown-item" href="{{ route('date-administration') }}">Date Administration</a></li>
                                <li><a class="dropdown-item" href="{{ route('email-administration') }}">Send Email</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="scrollable-content">
                        @yield('profile-content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
