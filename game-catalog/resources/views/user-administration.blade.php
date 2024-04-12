@extends('layouts.admin')

@section('admin-caption')
    @lang('title.user-administration')
@endsection

@section('admin-content')
    <table class="table">
        <tr>
            <th>@lang('element.email-address')</th>
            <th>@lang('element.name')</th>
            <th>@lang('element.status')</th>
            <th>@lang('element.actions')</th>
        </tr>
        @foreach($users as $current)
            <tr class="{{ $current->id === $user->id ? 'table-primary' : '' }}">
                <td class="user-table-cell">{{ $current->email }}</td>
                <td class="user-table-cell">{{ $current->name }}</td>
                <td><span class="badge rounded-pill {{ $current->admin ? "bg-primary" : "bg-secondary" }}">{{ $current->admin ? "Admin" : "User" }}</span></td>
                <td>
                    <div class="d-flex">
                        <form method="POST" action="{{ route('user-administration.change.status', ['id' => $current->id]) }}" class="flex-grow-1">
                            @csrf
                            <button type="submit" class="btn w-100 white-space-nowrap {{ $current->admin ? "btn-secondary" : "btn-primary" }}">
                                {{ $current->admin ? "Make user" : "Make admin" }}
                            </button>
                        </form>
                        <x-btn-delete action="{{ route('user-administration.delete', ['id' => $current->id]) }}" />
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
