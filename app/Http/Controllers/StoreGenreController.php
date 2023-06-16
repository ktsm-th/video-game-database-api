<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class StoreGenreController extends Controller
{
    public function __invoke(StoreGenreRequest $storeGenreRequest)
    {
        $genre = Genre::create($storeGenreRequest->validated());
        return GenreResource::make($genre);
    }
}
