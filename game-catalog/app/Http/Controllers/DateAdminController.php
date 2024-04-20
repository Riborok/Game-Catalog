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

    public function update(UpdateDateRequest $request, $id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', trans('session.not-found', ['name' => trans_choice('name.date', 1)]));
        }

        $dateText->date = $request->input('date');
        $dateText->text = $request->input('text');

        if ($dateText->save()) {
            DateText::clearCachedCalendar(Carbon::parse($dateText->date));
            return back()->with('success', trans('session.updated', ['name' => $dateText->date]));
        } else {
            return back()->with('error', trans('session.not-updated', ['name' => $dateText->date]));
        }
    }

    public function add(AddDateRequest $request)
    {
        DateText::clearCached();
        $dateText = new DateText();

        $dateText->date = $request->input('new-date');
        $dateText->text = $request->input('new-text');

        if ($dateText->save()) {
            DateText::clearCachedCalendar(Carbon::parse($dateText->date));
            return back()->with('success', trans('session.added', ['name' => $dateText->date]));
        } else {
            return back()->with('error', trans('session.not-added', ['name' => $dateText->date]));
        }
    }

    public function delete($id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', trans('session.not-found', ['name' => trans_choice('name.date', 1)]));
        }

        if ($dateText->delete()) {
            DateText::clearCachedCalendar(Carbon::parse($dateText->date));
            return back()->with('success', trans('session.deleted', ['name' => $dateText->date]));
        } else {
            return back()->with('error', trans('session.not-deleted', ['name' => $dateText->date]));
        }
    }
}
