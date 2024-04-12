@extends('layouts.app')

@section('title')
    @lang('title.catalog')
@endsection

@section('content')
    <div class="row mt-1 justify-content-center">
        @foreach ($games as $game)
            <x-game
                title="{{ $game->title }}"
                description="{{ $game->description }}"
                image="{{ $game->image }}"
                link="{{ $game->link }}"
            />
        @endforeach
    </div>
@endsection
