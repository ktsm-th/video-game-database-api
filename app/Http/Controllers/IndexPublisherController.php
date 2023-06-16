<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Request;

class IndexPublisherController extends Controller
{
    public function __invoke()
    {
        $publishers = Publisher::all();

        return PublisherResource::collection($publishers);
    }
}
