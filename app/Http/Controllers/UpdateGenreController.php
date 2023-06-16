<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateGenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class UpdateGenreController extends Controller
{
    public function __invoke(Genre $genre, UpdateGenreRequest $updateGenreRequest)
    {
        $genre->update($updateGenreRequest->validated());
        return GenreResource::make($genre);
    }
}
