@extends('layouts.profile')

@section('profile-content')
    <div class="profile-caption">@lang('element.information')</div>
    <div class="mb-3">
        <label for="name" class="form-label">@lang('element.name'):</label>
        <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">@lang('element.email-address'):</label>
        <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">@lang('element.status'):</label>
        <input type="text" class="form-control" id="status" value="{{App\Utils\Other::mb_ucfirst(trans_choice('user-status.' . ($user->admin ? 'admin' : 'user'), 1))}}" disabled>
    </div>
    <div class="mt-3">
        <form method="POST" action="{{ route('logout.request') }}">
            @csrf
            <button type="submit" class="btn btn-danger">@lang('element.logout')</button>
        </form>
    </div>
@endsection
