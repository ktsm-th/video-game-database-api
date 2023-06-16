<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use Illuminate\Http\Request;

class UpdateGameController extends Controller
{
    public function __invoke(Game $game, UpdateGameRequest $updateGameRequest)
    {
        $game->update($updateGameRequest->validated());
        return GameResource::make($game);
    }
}
