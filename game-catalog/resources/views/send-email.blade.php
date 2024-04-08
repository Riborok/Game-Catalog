@extends('layouts.admin')

@section('admin-caption')
    Send Email
@endsection

@section('admin-content')
    <form method="POST" action="{{ route('email-administration.request') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="receiver">Receiver:</label>
            <select id="receiver" name="receiver" class="form-control @error('receiver') is-invalid @enderror">
                @foreach($users as $curr)
                    <option value="{{ $curr->email }}">{{ $curr->email }}</option>
                @endforeach
            </select>
            @error('receiver')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="text">Text:</label>
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror" rows="4"></textarea>
            @error('text')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check mb-1">
            <input class="form-check-input" type="checkbox" id="send-to-all" name="send_to_all">
            <label class="form-check-label" for="send-to-all">
                Send to all users
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>

    <script src="{{ asset('/js/send-email.js') }}" defer></script>
@endsection
