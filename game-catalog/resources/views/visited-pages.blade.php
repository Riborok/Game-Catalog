@extends('layouts.app')

@section('title')
    Visited Pages
@endsection

@php
    const PAGE_SIZE = 10;
@endphp

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-4">
            <div class="text-center profile-caption">Visited Pages</div>
            <table class="table table-bordered fixed-table-layout">
                <thead>
                <tr>
                    <th>Page</th>
                    <th>Visited At</th>
                </tr>
                </thead>
                <tbody id="visitedPagesBody">
                @foreach (array_reverse(array_slice($visitedPages, 0, PAGE_SIZE)) as $site)
                    <tr>
                        <td>{{ $site['name'] }}</td>
                        <td>{{ $site['timestamp'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button id="btnShowMore" class="btn btn-primary d-none mx-auto">Show more</button>
        </div>
    </div>

    <script>
        window.visitedPages = @json($visitedPages);
        window.pageSize = @json(PAGE_SIZE);
    </script>
    <script src="{{ asset('/js/visitedPages.js') }}" defer></script>
@endsection
