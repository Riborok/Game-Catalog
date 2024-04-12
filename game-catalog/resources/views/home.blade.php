@extends('layouts.app')

@section('title')
    @lang('title.home')
@endsection

@section('content')
    <div class="mt-2">
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
