@extends('layouts.app')

@section('title')
    Introduction to Games
@endsection

@section('content')
    <div class="mt-3">
        @foreach ($features as $feature)
            <x-featurette
                title="{{ $feature->title }}"
                text="{{ $feature->text }}"
                image="{{ $feature->image }}"
                order="{{ $feature->order }}"
            />
        @endforeach
    </div>
@endsection
