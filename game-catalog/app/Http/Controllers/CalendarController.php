<?php

namespace App\Http\Controllers;

use App\Models\DateText;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class CalendarController extends Controller
{
    public const SHORT_DAYS_OF_WEEK = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    private const MIN_MONTH = 1;
    private const MAX_MONTH = 12;

    private static function isNormalMonth($month) {
        return $month >= self::MIN_MONTH && $month <= self::MAX_MONTH;
    }

    public static function normalizeDate($year, $month) {
        $year += intdiv($month, static::MAX_MONTH);
        $month = $month % static::MAX_MONTH;

        if ($month < static::MIN_MONTH) {
            $year--;
            $month += static::MAX_MONTH;
        }

        return ['year' => $year, 'month' => $month];
    }

    public function showTodaysCalendar() {
        $currentDate = \Carbon\Carbon::now();
        return redirect()->route('calendar', ['year' => $currentDate->year, 'month' => $currentDate->month]);
    }

    public function showCalendar($year, $month) {
        if (!static::isNormalMonth($month))
            return redirect()->route('calendar', static::normalizeDate($year, $month));

        $calendar = $this->generateCalendar($year, $month);
        return view('calendar', compact('calendar', 'year', 'month'));
    }

    private function generateCalendar($year, $month) {
        return DateText::retrieveCachedCalendar($year, $month, function () use ($year, $month) {
            $calendar = [];
            $currentDate = Carbon::createFromDate($year, $month, 1)->startOfWeek();

            $this->fillWeeks($currentDate, $calendar, 6);
            $this->fillDateText($calendar);

            return $calendar;
        });
    }

    private function fillWeeks($currentDate, &$calendar, $week_count) {
        while (count($calendar) < $week_count * count(static::SHORT_DAYS_OF_WEEK)) {
            $calendar[] = ['date' => $currentDate->copy()];
            $currentDate->addDay();
        }
    }

    private function fillDateText(&$calendar) {
        foreach ($calendar as &$day) {
            $date = Carbon::createFromDate($day['date']->format('Y-m-d'));
            $dateText = DateText::whereDate($date);
            $day['text'] = $dateText;
        }
    }
}
