<?php

namespace App\Http\Controllers;

use App\Models\Publisher;

class DeletePublisherController extends Controller
{
    public function __invoke(Publisher $publisher)
    {
        $publisher->delete();
        return response('Deleted!', 200);
    }
}
