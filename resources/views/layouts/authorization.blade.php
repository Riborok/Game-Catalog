@extends('layouts.app')

@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-bg-dark">@yield('title')</div>
                <div class="card-body">
                    @yield('authorization-content')
                </div>
            </div>
        </div>
    </div>
@endsection
