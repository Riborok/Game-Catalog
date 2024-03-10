@extends('layouts.app')

@section('title')
    Profile {{ $user->name }}
@endsection

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-bg-dark">Profile</div>
                <div class="card-body">
                    <h5 class="card-title">User Information</h5>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mt-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Leave</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
