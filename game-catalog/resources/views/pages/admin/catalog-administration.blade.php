@extends('layouts.admin')

@section('admin-caption')
    @lang('title.catalog-administration')
@endsection

@section('admin-content')
    <table class="table">
        <tr>
            <th>@lang('element.title')</th>
            <th>@lang('element.description')</th>
            <th>@lang('element.image')</th>
            <th>@lang('element.link')</th>
            <th>@lang('element.actions')</th>
        </tr>
        @foreach($games as $game)
            <tr>
                <form method="POST" action="{{ route('catalog-administration.update', ['id' => $game->id]) }}">
                    @csrf
                    @method('PUT')
                    <td>
                        <x-input.text
                            name="title"
                            placeholder="{{ $game->title }}"
                        />
                    </td>
                    <td>
                        <x-input.textarea-field
                            name="description"
                            placeholder="{{ $game->description }}"
                            rows="10"
                        />
                    </td>
                    <td>
                        <div class="d-flex flex-column align-items-start img-cell">
                            <x-input.text
                                name="image"
                                placeholder="{{ $game->image }}"
                            />
                            <img src="{{ $game->image }}" alt="{{ $game->title }}" class="w-100 mt-1">
                        </div>
                    </td>
                    <td>
                        <x-input.text
                            name="link"
                            placeholder="{{ $game->link }}"
                        />
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary mb-1 white-space-nowrap w-100">@lang('element.update')</button>
                </form>
                    <x-button.delete action="{{ route('catalog-administration.delete', ['id' => $game->id]) }}" />
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        <div class="profile-caption">{{trans('element.add') . ' ' . App\Utils\Other::mb_lcfirst(trans_choice('name.game', 2))}}</div>
        <form method="POST" class="mt-1" action="{{ route('catalog-administration.add') }}">
            @csrf
            <div class="form-group">
                <label for="new-title">{{ trans('element.title') }}</label>
                <x-input.text
                    name="new-title"
                    placeholder=""
                />
            </div>
            <div class="form-group mt-2">
                <label for="new-description">{{ trans('element.description') }}</label>
                <x-input.textarea-field
                    name="new-description"
                    placeholder=""
                />
            </div>
            <div class="form-group mt-2">
                <label for="new-image">{{ trans('element.image') }}</label>
                <x-input.text
                    name="new-image"
                    placeholder=""
                />
            </div>
            <div class="form-group mt-2">
                <label for="new-link">{{ trans('element.link') }}</label>
                <x-input.text
                    name="new-link"
                    placeholder=""
                />
            </div>
            <button type="submit" class="btn btn-success mt-2">{{ trans('element.add') }}</button>
        </form>
    </div>
@endsection
