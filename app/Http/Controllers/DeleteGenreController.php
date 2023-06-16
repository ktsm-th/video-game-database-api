<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class DeleteGenreController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $genre->delete();
        return response('Deleted!', 200);
    }
}
