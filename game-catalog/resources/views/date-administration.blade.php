@extends('layouts.admin')

@section('admin-caption')
    All Dates
@endsection

@section('admin-content')
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Text</th>
            <th>Actions</th>
        </tr>
        @foreach($dates as $date)
            <tr>
                <form method="POST" action="{{ route('date-administration.update', ['id' => $date->id]) }}">
                    @csrf
                    @method('PUT')
                    <td>
                        <input id="date" type="date" class="form-control" name="date" value="{{ $date->date }}">
                    </td>
                    <td class="date-text-width">
                        <x-input-field
                            name="text"
                            placeholder="{{ $date->text }}"
                        />
                    </td>
                    <td class="d-flex">
                        <button type="submit" class="btn btn-primary w-100 white-space-nowrap">Update</button>
                </form>
                    <x-btn-delete action="{{ route('date-administration.delete', ['id' => $date->id]) }}" />
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        <div class="table-name">Add Date</div>
        <form method="POST" action="{{ route('date-administration.add') }}">
            @csrf
            <div class="form-group">
                <label for="new-date">Date:</label>
                <input id="new-date" type="date" class="form-control" name="new-date" value="{{ old('new-date') }}" required>
            </div>
            <div class="form-group mt-1">
                <label for="new-text">Text:</label>
                <x-input-field
                    name="new-text"
                    placeholder=""
                />
            </div>
            <button type="submit" class="btn btn-success mt-2">Add</button>
        </form>
    </div>
@endsection
