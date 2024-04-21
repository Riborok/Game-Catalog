@extends('layouts.admin')

@section('admin-caption')
    @lang('title.send-email')
@endsection

@section('admin-content')
    <form method="POST" action="{{ route('email-administration.request') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="receiver">@lang('send-email.receiver'):</label>
            <x-input.select name="receiver" :options="$users->pluck('email', 'email')"/>
            @error('receiver')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="text">@lang('element.text'):</label>
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="4"></textarea>
            @error('text')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check mb-1">
            <input class="form-check-input" type="checkbox" id="send-to-all" name="send_to_all">
            <label class="form-check-label" for="send-to-all">
                @lang('send-email.send-to-all-users')
            </label>
        </div>
        <button type="submit" class="btn btn-primary">@lang('title.send-email')</button>
    </form>

    <script src="{{ asset('/js/send-email.js') }}" defer></script>
@endsection
