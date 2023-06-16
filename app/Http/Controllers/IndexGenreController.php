<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class IndexGenreController extends Controller
{
    public function __invoke()
    {
        $genres = Genre::all();

        return GenreResource::collection($genres);
    }}
