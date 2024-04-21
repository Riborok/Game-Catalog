<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use App\Http\Requests\AddFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Utils\Translate;
use Illuminate\Support\Facades\Auth;

class HomeAdminController extends Controller
{
    public function showHomeAdministration()
    {
        $user = Auth::user();
        $features = Feature::retrieveCached();
        Translate::translateFieldsDefault($features, ['title', 'text']);
        return VisitedPages::view('pages.admin.home-administration', ['user' => $user, 'features' => $features]);
    }

    public function update(UpdateFeatureRequest $request, $id)
    {
        Feature::clearCached();
        $feature = Feature::find($id);
        if (!$feature) {
            return back()->with('error', trans('session.not-found', ['name' => trans('name.feature')]));
        }

        $feature->title = $request->input('title');
        $feature->text = $request->input('text');
        $feature->image = $request->input('image');
        $feature->order = $request->input('order');

        if ($feature->save()) {
            return back()->with('success', trans('session.updated', ['name' => $feature->title]));
        } else {
            return back()->with('error', trans('session.not-updated', ['name' => $feature->title]));
        }
    }

    public function add(AddFeatureRequest $request)
    {
        Feature::clearCached();
        $feature = new Feature();

        $feature->title = $request->input('new-title');
        $feature->text = $request->input('new-text');
        $feature->image = $request->input('new-image');
        $feature->order = $request->input('new-order');

        if ($feature->save()) {
            return back()->with('success', trans('session.added', ['name' => $feature->title]));
        } else {
            return back()->with('error', trans('session.not-added', ['name' => $feature->title]));
        }
    }

    public function delete($id)
    {
        Feature::clearCached();
        $feature = Feature::find($id);
        if (!$feature) {
            return back()->with('error', trans('session.not-found', ['name' => trans('name.feature')]));
        }

        if ($feature->delete()) {
            return back()->with('success', trans('session.deleted', ['name' => $feature->title]));
        } else {
            return back()->with('error', trans('session.not-deleted', ['name' => $feature->title]));
        }
    }
}
