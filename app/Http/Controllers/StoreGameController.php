<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class StoreGameController extends Controller
{
    public function __invoke(StoreGameRequest $storeGameRequest)
    {
        $game = Game::create($storeGameRequest->validated());
        return GameResource::make($game);
    }
}
