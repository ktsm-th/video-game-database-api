<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use App\Models\Publisher;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class ViewGameByPublisherController extends Controller
{
    public function __invoke(Publisher $publisher)
    {
        return GameResource::collection($publisher->games);
    }
}
