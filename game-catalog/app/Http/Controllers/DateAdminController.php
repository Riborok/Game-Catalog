<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDateRequest;
use App\Http\Requests\UpdateDateRequest;
use App\Models\DateText;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DateAdminController extends Controller
{
    public function showDateAdministration()
    {
        $user = Auth::user();
        $dates = DateText::retrieveCached();
        return VisitedPages::view('date-administration', ['user' => $user, 'dates' => $dates]);
    }

    public function updateDate(UpdateDateRequest $request, $id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', trans('session.date-not-found'));
        }

        $dateText->date = $request->input('date');
        $dateText->text = $request->input('text');

        if ($dateText->save()) {
            DateText::clearCachedCalendar(Carbon::parse($dateText->date));
            return back()->with('success', trans('session.date-updated-successfully'));
        } else {
            return back()->with('error', trans('session.date-not-updated'));
        }
    }

    public function addDate(AddDateRequest $request)
    {
        DateText::clearCached();
        $dateText = new DateText();
        $dateText->date = $request->input('new-date');
        $dateText->text = $request->input('new-text');

        if ($dateText->save()) {
            DateText::clearCachedCalendar(Carbon::parse($dateText->date));
            return back()->with('success', trans('session.date-added-successfully'));
        } else {
            return back()->with('error', trans('session.date-not-added'));
        }
    }

    public function deleteDate($id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', trans('session.date-not-found'));
        }

        if ($dateText->delete()) {
            DateText::clearCachedCalendar(Carbon::parse($dateText->date));
            return back()->with('success', trans('session.date-deleted-successfully'));
        } else {
            return back()->with('error', trans('session.date-not-deleted'));
        }
    }
}
