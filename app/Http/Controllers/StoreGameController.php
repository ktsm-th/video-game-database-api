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
        $fileName = time() . '.' . $storeGameRequest->image->extension();
        $image = $storeGameRequest->image->storeAs('public/images', $fileName);

        $game = Game::create(
            array_merge(
                $storeGameRequest->except('console_ids','genre_ids', 'image'),
                [
                    'image' => asset('storage/images/' . $fileName),
                ],
            )
        );

        $game->consoles()->attach($storeGameRequest->console_ids);
        $game->genres()->attach($storeGameRequest->genre_ids);

        return GameResource::make($game);
    }
}
