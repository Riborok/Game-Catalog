@extends('layouts.profile')

@section('profile-content')
    <div class="table-name">All Users</div>
    <div class="scrollable-table">
        <table class="table">
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $current)
                <tr class="{{ $current->id === $user->id ? 'table-primary' : '' }}">
                    <td class="table-cell">{{ $current->email }}</td>
                    <td class="table-cell">{{ $current->name }}</td>
                    <td><span class="badge rounded-pill {{ $current->admin ? "bg-primary" : "bg-secondary" }}">{{ $current->admin ? "Admin" : "User" }}</span></td>
                    <td>
                        <div class="d-flex">
                            <form method="POST" action="{{ route('delete.user', ['id' => $current->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <form method="POST" action="{{ route('change.status.user', ['id' => $current->id]) }}" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn ms-1 w-100 white-space-nowrap {{ $current->admin ? "btn-secondary" : "btn-primary" }}">
                                    {{ $current->admin ? "Make user" : "Make admin" }}
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
