<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class ViewGameController extends Controller
{
    public function __invoke(Game $game)
    {
        return GameResource::make($game);
    }
}
