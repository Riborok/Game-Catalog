@extends('layouts.admin')

@section('admin-caption')
    @lang('title.home-administration')
@endsection

@section('admin-content')
    <table class="table">
        <tr>
            <th>@lang('element.title')</th>
            <th>@lang('element.text')</th>
            <th>@lang('element.image')</th>
            <th>@lang('element.order')</th>
            <th>@lang('element.actions')</th>
        </tr>
        @foreach($features as $feature)
            <tr>
                <form method="POST" action="{{ route('home-administration.update', ['id' => $feature->id]) }}">
                    @csrf
                    @method('PUT')
                    <td>
                        <x-input.text
                            name="title"
                            placeholder="{{ $feature->title }}"
                        />
                    </td>
                    <td>
                        <x-input.textarea-field
                            name="text"
                            placeholder="{{ $feature->text }}"
                        />
                    </td>
                    <td>
                        <div class="d-flex flex-column align-items-start img-cell">
                            <x-input.text
                                name="image"
                                placeholder="{{ $feature->image }}"
                            />
                            <img src="{{ $feature->image }}" alt="{{ $feature->title }}" class="w-100 mt-1">
                        </div>
                    </td>
                    <td>
                        <x-input.select
                            name="order"
                            :options="['first' => trans('element.first'), 'second' => trans('element.second')]"
                            :selected="$feature->order"
                        />
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary mb-1 white-space-nowrap w-100">@lang('element.update')</button>
                </form>
                    <x-button.delete action="{{ route('home-administration.delete', ['id' => $feature->id]) }}" />
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        <div class="profile-caption">{{trans('element.add') . ' ' . App\Utils\Other::mb_lcfirst(trans_choice('name.feature', 2))}}</div>
        <form method="POST" class="mt-1" action="{{ route('home-administration.add') }}">
            @csrf
            <div class="form-group">
                <label for="new-title">{{ trans('element.title') }}</label>
                <x-input.text
                    name="new-title"
                    placeholder=""
                />
            </div>
            <div class="form-group mt-2">
                <label for="new-text">{{ trans('element.text') }}</label>
                <x-input.textarea-field
                    name="new-text"
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
                <label for="new-order">{{ trans('element.order') }}</label>
                <x-input.select
                    name="new-order"
                    :options="['first' => trans('element.first'), 'second' => trans('element.second')]"
                />
            </div>
            <button type="submit" class="btn btn-success mt-2">{{ trans('element.add') }}</button>
        </form>
    </div>
@endsection
