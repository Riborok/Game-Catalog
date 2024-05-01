@extends('layouts.app')

@section('title')
    @lang('title.home')
@endsection

@section('content')
    <div class="mt-2">
        @foreach ($features as $feature)
            <div class="row">
                <div class="col-md-5 {{ $feature->order === 'second' ? 'order-md-2' : '' }}">
                    <h2 class="fw-normal lh-1">{{ $feature->title }}</h2>
                    <p class="lead">{{ $feature->text }}</p>
                </div>
                <div class="col-md-7 {{ $feature->order === 'second' ? 'order-md-1' : '' }}">
                    <img src="{{ $feature->image }}" class="img-fluid mx-auto" alt="{{ $feature->title }}">
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
