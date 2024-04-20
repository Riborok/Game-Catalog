@extends('layouts.admin')

@section('admin-caption')
    @lang('title.statistics')
@endsection

@section('admin-content')
    <table class="table">
        <tr>
            <th>@lang('element.name')</th>
            <th>@lang('element.ip')</th>
            <th>@lang('element.os')</th>
            <th>@lang('element.browser')</th>
        </tr>
        @foreach($activities as $activity)
            <tr>
                <td class="align-middle">
                    <div class="statistics-cell">
                        {{$activity->user_id ? $users[$activity->user_id] : trans('element.unknown')}}
                    </div>
                </td>
                <td>
                    {{$activity->ip}}
                </td>
                <td>
                    {{$activity->os}}
                </td>
                <td>
                    {{$activity->browser}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
