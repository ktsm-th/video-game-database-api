<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class ViewGenreController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return GenreResource::make($genre);
    }
}
