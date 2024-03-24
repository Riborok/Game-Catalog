<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateRequest;
use App\Models\DateText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateAdminController extends Controller
{
    public function dateAdministration()
    {
        $user = Auth::user();
        $dates = DateText::retrieveCached();
        return view('date-administration', ['user' => $user, 'dates' => $dates]);
    }

    public function updateDate(DateRequest $request, $id)
    {
        DateText::clearCached();
        $dateText = DateText::find($id);
        if (!$dateText) {
            return back()->with('error', 'Date not found.');
        }

        $dateText->date = $request->input('date');
        $dateText->text = $request->input('text');
        $dateText->save();
        return back()->with('success', 'Date updated successfully.');
    }

    public function addDate(DateRequest $request)
    {
        DateText::clearCached();
        $dateText = new DateText();
        $dateText->date = $request->input('date');
        $dateText->text = $request->input('text');
        $dateText->save();
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
        return back()->with('success', 'Date deleted successfully.');
    }
}
