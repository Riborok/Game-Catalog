@extends('layouts.admin')

@section('admin-caption')
    @lang('title.statistics')
@endsection

@section('admin-content')

    <div class="profile-subtitle">@lang('statistics.user-info')</div>
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
                        {{$activity->user_id && isset($users[$activity->user_id]) ? $users[$activity->user_id] : trans_choice('element.unknown', 1)}}
                    </div>
                </td>
                <td>
                    {{$activity->ip}}
                </td>
                <td>
                    {{$activity->os ?: trans_choice('element.unknown', 2)}}
                </td>
                <td>
                    {{$activity->browser ?: trans_choice('element.unknown', 2)}}
                </td>
            </tr>
        @endforeach
    </table>

    <div class="profile-subtitle">@lang('statistics.link-clicks')</div>
    <table class="table">
        <tr>
            <th>@lang('element.url')</th>
            <th>@lang('element.clicks')</th>
        </tr>
        @foreach($links as $link)
            <tr>
                <td>
                    {{$link->url}}
                </td>
                <td>
                    {{$link->clicks}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
