@extends('layouts.authorization')

@section('title')
    @lang('title.reset-password')
@endsection

@section('authorization-content')
    <x-message.session-alert-message sessionName="error"/>
    <x-message.all-errors-alert/>
    <form method="POST" action="{{ route('password.reset.request') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">
        <input type="hidden" name="email" value="{{ $request->email }}">
        @include('components.input.password')
        @include('components.input.password-confirm')
        <button type="submit" class="btn btn-primary">@lang('title.reset-password')</button>
    </form>
@endsection
