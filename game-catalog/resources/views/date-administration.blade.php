@extends('layouts.admin')

@section('admin-caption')
    @lang('title.date-administration')
@endsection

@section('admin-content')
    <table class="table">
        <tr>
            <th>@choice('name.date', 1)</th>
            <th>@lang('element.text')</th>
            <th>@lang('element.actions')</th>
        </tr>
        @foreach($dates as $date)
            <tr>
                <form method="POST" action="{{ route('date-administration.update', ['id' => $date->id]) }}">
                    @csrf
                    @method('PUT')
                    <td>
                        <input id="date" type="date" class="form-control" name="date" value="{{ $date->date }}">
                    </td>
                    <td>
                        <x-input-field
                            name="text"
                            placeholder="{{ $date->text }}"
                        />
                    </td>
                    <td class="d-flex">
                        <button type="submit" class="btn btn-primary me-1 w-100 white-space-nowrap">@lang('element.update')</button>
                </form>
                    <x-btn-delete action="{{ route('date-administration.delete', ['id' => $date->id]) }}" />
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        <div class="profile-caption">{{trans('element.add') . ' ' . App\Utils\Other::mb_lcfirst(trans_choice('name.date', 2))}}</div>
        <form method="POST" class="mt-1" action="{{ route('date-administration.add') }}">
            @csrf
            <div class="form-group">
                <label for="new-date">@choice('name.date', 1)</label>
                <input id="new-date" type="date" class="form-control" name="new-date" value="{{ old('new-date') }}" required>
            </div>
            <div class="form-group mt-1">
                <label for="new-text">@lang('element.text')</label>
                <x-input-field
                    name="new-text"
                    placeholder=""
                />
            </div>
            <button type="submit" class="btn btn-success mt-2">@lang('element.add')</button>
        </form>
    </div>
@endsection
