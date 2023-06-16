<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class IndexGameController extends Controller
{
    public function __invoke()
    {
        $games = Game::all();

        return GameResource::collection($games);
    }
}
