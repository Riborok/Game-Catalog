@extends('layouts.app')

@section('title')
    @lang('title.catalog')
@endsection

@section('content')
    <div class="row mt-1 justify-content-center">
        @foreach ($games as $game)
            <div class="col-md-4 my-2">
                <div class="card h-100">
                    <img src="{{ $game->image }}" class="card-img-top img-fluid game-card-img-height" alt="{{ $game->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-text">{!! App\Utils\TextHighlighter::highlightText(htmlspecialchars($game->description)) !!}</p>
                        <a href="{{route('redirect', ['url' => urlencode($game->link)])}}" class="btn btn-primary mt-auto" target="_blank">@lang('catalog.go-to-off-size')</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
