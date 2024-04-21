<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\handler\VisitedPages;
use App\Http\Requests\AddGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Utils\Translate;
use Illuminate\Support\Facades\Auth;

class CatalogAdminController extends Controller
{
    public function showCatalogAdministration()
    {
        $user = Auth::user();
        $games = Game::retrieveCached();
        Translate::translateFieldsDefault($games, ['title', 'description']);
        return VisitedPages::view('pages.admin.catalog-administration', ['user' => $user, 'games' => $games]);
    }

    public function update(UpdateGameRequest $request, $id)
    {
        Game::clearCached();
        $game = Game::find($id);
        if (!$game) {
            return back()->with('error', trans('session.not-found', ['name' => trans_choice('name.game', 1)]));
        }

        $game->title = $request->input('title');
        $game->description = $request->input('description');
        $game->image = $request->input('image');
        $game->link = $request->input('link');

        if ($game->save()) {
            return back()->with('success', trans('session.updated', ['name' => $game->title]));
        } else {
            return back()->with('error', trans('session.not-updated', ['name' => $game->title]));
        }
    }

    public function add(AddGameRequest $request)
    {
        Game::clearCached();
        $game = new Game();

        $game->title = $request->input('new-title');
        $game->description = $request->input('new-description');
        $game->image = $request->input('new-image');
        $game->link = $request->input('new-link');

        if ($game->save()) {
            return back()->with('success', trans('session.added', ['name' => $game->title]));
        } else {
            return back()->with('error', trans('session.not-added', ['name' => $game->title]));
        }
    }

    public function delete($id)
    {
        Game::clearCached();
        $game = Game::find($id);
        if (!$game) {
            return back()->with('error', trans('session.not-found', ['name' => trans_choice('name.game', 1)]));
        }

        if ($game->delete()) {
            return back()->with('success', trans('session.deleted', ['name' => $game->title]));
        } else {
            return back()->with('error', trans('session.not-deleted', ['name' => $game->title]));
        }
    }
}
