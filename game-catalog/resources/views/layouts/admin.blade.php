@extends('layouts.profile')

@section('profile-content')
    <x-session-alert-message sessionName="error"/>
    <x-session-alert-message sessionName="success"/>
    <div class="profile-caption">@yield('admin-caption')</div>
    @yield('admin-content')
@endsection
