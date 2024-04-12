@extends('layouts.app')

@section('title')
    @lang('title.calendar')
@endsection

@section('content')
<div class="row justify-content-center my-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ App\Utils\Other::mb_ucfirst(Carbon\Carbon::createFromDate($year, $month)->translatedFormat('F Y')) }}</span>
                <div class="text-end">
                    <a href="{{ route('calendar', App\Http\Controllers\CalendarController::normalizeDate($year, $month - 1)) }}" class="btn-square text-decoration-none text-dark">↑</a>
                    <a href="{{ route('calendar', App\Http\Controllers\CalendarController::normalizeDate($year, $month + 1)) }}" class="btn-square text-decoration-none ms-2 text-dark">↓</a>
                </div>
            </div>
            <div class="card-body text-center">
                <table class="table table-borderless fixed-table-layout">
                    <tr>
                        @foreach (trans('calendar.short-days') as $day)
                            <th>{{ $day }}</th>
                        @endforeach
                    </tr>
                    @foreach (array_chunk($calendar, count(Carbon\Carbon::getDays())) as $week)
                        <tr>
                            @foreach ($week as $day)
                                <td class="{{ $day['date']->format('m') == $month ? 'text-dark' : 'text-body-tertiary' }}" data-toggle="tooltip" title="{{ $day['text'] ?? '' }}">
                                    <div class="{{$day['class'] ?? ''}}">
                                        {{ $day['date']->format('d') }}
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
