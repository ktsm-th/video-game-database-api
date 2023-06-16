<?php

namespace App\Http\Controllers;

use App\Models\Game;

class DeleteGameController extends Controller
{
    public function __invoke(Game $game)
    {
        $game->delete();
        return response('Deleted!', 200);
    }
}
