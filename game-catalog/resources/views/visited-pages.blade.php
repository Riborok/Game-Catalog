@extends('layouts.app')

@section('title')
    Visited Pages
@endsection

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
                <tbody>
                @foreach (array_reverse($visitedPages) as $site)
                    <tr>
                        <td>{{ $site['name'] }}</td>
                        <td>{{ date('Y-m-d H:i:s', $site['timestamp']) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
