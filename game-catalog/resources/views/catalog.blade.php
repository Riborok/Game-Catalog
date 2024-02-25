@extends('layouts.app')

@section('title')
    Game Catalog
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-3 mt-1">
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
