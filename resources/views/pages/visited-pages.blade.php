@extends('layouts.app')

@section('title')
    @lang('title.visited-pages')
@endsection

@php
    const PAGE_SIZE = 10;
@endphp

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-4">
            <div class="text-center profile-caption mb-1">@lang('title.visited-pages')</div>
            <table class="table table-bordered fixed-table-layout">
                <thead>
                <tr>
                    <th>@lang('visited-pages.page')</th>
                    <th>@lang('visited-pages.visitedAt')</th>
                </tr>
                </thead>
                <tbody id="visitedPagesBody">
                @foreach (array_slice($visitedPages, 0, PAGE_SIZE) as $site)
                    <tr>
                        <td>@lang('title.' . $site['name'])</td>
                        <td>{{ $site['timestamp'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button id="btnShowMore" class="btn btn-primary d-none mx-auto">@lang('element.show-more')</button>
        </div>
    </div>

    <script>
        window.visitedPages = @json($visitedPages);
        window.pageSize = @json(PAGE_SIZE);
    </script>
    <script src="{{ asset('/js/visited-pages.js') }}" defer></script>
@endsection
