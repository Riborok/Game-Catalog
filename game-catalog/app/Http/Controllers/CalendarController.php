<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CalendarController extends Controller
{
    public const SHORT_DAYS_OF_WEEK = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

    public function showTodaysCalendar() {
        $currentDate = \Carbon\Carbon::now();
        return Redirect::route('calendar', ['year' => $currentDate->year, 'month' => $currentDate->month]);
    }

    public function showCalendar($year, $month)
    {
        $year = $year ?? Carbon::now()->year;
        $month = $month ?? Carbon::now()->month;

        $calendar = $this->generateCalendar($year, $month);

        return view('calendar', compact('calendar', 'year', 'month'));
    }

    public static function normalizeDate($year, $month)
    {
        if ($month < 1) {
            $year--;
            $month = 12;
        } elseif ($month > 12) {
            $year++;
            $month = 1;
        }
        return ['year' => $year, 'month' => $month];
    }

    private function generateCalendar($year, $month)
    {
        $calendar = [];
        $currentDate = Carbon::createFromDate($year, $month, 1)->startOfWeek();

        $this->addPreviousMonthDays($currentDate, $month, $calendar);
        $this->addCurrentMonthDays($currentDate, $month, $calendar);
        $this->addDaysToEndOfWeek($currentDate, $calendar);
        $this->addDaysToSixWeeks($currentDate, $calendar);

        return $calendar;
    }

    private function addPreviousMonthDays($currentDate, $month, &$calendar)
    {
        while ($currentDate->month != $month) {
            $calendar[] = [
                'date' => $currentDate->format('d'),
                'otherMonth' => true,
            ];
            $currentDate->addDay();
        }
    }

    private function addCurrentMonthDays($currentDate, $month, &$calendar)
    {
        while ($currentDate->month == $month) {
            $calendar[] = [
                'date' => $currentDate->format('d'),
                'otherMonth' => false,
            ];
            $currentDate->addDay();
        }
    }

    private function addDaysToEndOfWeek($currentDate, &$calendar)
    {
        while ($currentDate->dayOfWeek != 1) {
            $calendar[] = [
                'date' => $currentDate->format('d'),
                'otherMonth' => true,
            ];
            $currentDate->addDay();
        }
    }

    private function addDaysToSixWeeks($currentDate, &$calendar)
    {
        while (count($calendar) < 6 * count(CalendarController::SHORT_DAYS_OF_WEEK)) {
            $calendar[] = [
                'date' => $currentDate->format('d'),
                'otherMonth' => true,
            ];
            $currentDate->addDay();
        }
    }
}
