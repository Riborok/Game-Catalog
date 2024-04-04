<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDateRequest;
use App\Http\Requests\UpdateDateRequest;
use App\Models\DateText;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DateAdminController extends Controller
{
    public function dateAdministration()
    {
        $user = Auth::user();
        $dates = DateText::retrieveCached();
        return TrackingController::view('date-administration', ['user' => $user, 'dates' => $dates]);
    }

    public function updateDate(UpdateDateRequest $request, $id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', 'Date not found.');
        }

        $dateText->date = $request->input('date');
        $dateText->text = $request->input('text');
        $dateText->save();
        DateText::clearCachedCalendar(Carbon::parse($dateText->date));
        return back()->with('success', 'Date updated successfully.');
    }

    public function addDate(AddDateRequest $request)
    {
        DateText::clearCached();
        $dateText = new DateText();
        $dateText->date = $request->input('new-date');
        $dateText->text = $request->input('new-text');
        $dateText->save();
        DateText::clearCachedCalendar(Carbon::parse($dateText->date));
        return back()->with('success', 'Date added successfully.');
    }

    public function deleteDate($id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', 'Date not found.');
        }

        $dateText->delete();
        DateText::clearCachedCalendar(Carbon::parse($dateText->date));
        return back()->with('success', 'Date deleted successfully.');
    }
}