<?php

namespace App\Http\Controllers;

use App\Models\DateText;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CalendarController extends Controller
{
    public const SHORT_DAYS_OF_WEEK = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    public static function normalizeDate($year, $month) {
        if ($month < 1) {
            $year--;
            $month = 12;
        } elseif ($month > 12) {
            $year++;
            $month = 1;
        }
        return ['year' => $year, 'month' => $month];
    }

    public function showTodaysCalendar() {
        $currentDate = \Carbon\Carbon::now();
        return Redirect::route('calendar', ['year' => $currentDate->year, 'month' => $currentDate->month]);
    }

    public function showCalendar($year, $month) {
        $calendar = $this->generateCalendar($year, $month);

        return view('calendar', compact('calendar', 'year', 'month'));
    }

    private function generateCalendar($year, $month) {
        $calendar = [];
        $currentDate = Carbon::createFromDate($year, $month, 1)->startOfWeek();

        $this->fillWeeks($currentDate, $calendar, 6);
        $this->fillDateText($calendar);

        return $calendar;
    }

    private function fillWeeks($currentDate, &$calendar, $week_count) {
        while (count($calendar) < $week_count * count(CalendarController::SHORT_DAYS_OF_WEEK)) {
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
