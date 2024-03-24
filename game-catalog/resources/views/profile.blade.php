@extends('layouts.profile')

@section('profile-content')
    <h5 class="card-title">Information</h5>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <input type="text" class="form-control" id="status" value="{{ $user->admin ? "Admin" : "User" }}" disabled>
    </div>
    <div class="mt-3">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Leave</button>
        </form>
    </div>
@endsection
