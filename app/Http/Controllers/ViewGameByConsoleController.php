<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Console;
use App\Models\Game;
use Illuminate\Http\Request;

class ViewGameByConsoleController extends Controller
{
    public function __invoke(Console $console)
    {
        return GameResource::collection($console->games);

        // return view('games', [
        //     'games' => $console->games
        // ]);
    }
}
