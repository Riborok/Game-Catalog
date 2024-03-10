@extends('layouts.app')

@section('title')
    Game Catalog
@endsection

@section('content')
    <div class="row mt-1 justify-content-center">
        @foreach ($games as $game)
            <x-game
                title="{{ $game->title }}"
                text="{{ $game->description }}"
                image="{{ $game->image }}"
                link="{{ $game->link }}"
            />
        @endforeach
    </div>
@endsection
