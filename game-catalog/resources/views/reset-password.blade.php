@extends('layouts.authorization')

@section('title')
    Reset Password
@endsection

@section('authorization-content')
    <x-session-alert-message sessionName="error"/>
    <form method="POST" action="{{ route('password.reset.request') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">
        <input type="hidden" name="email" value="{{ $request->email }}">
        @include('components.inputs.input-password')
        @include('components.inputs.input-password-confirm')
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
@endsection
