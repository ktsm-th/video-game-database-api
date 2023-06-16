<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Request;

class ViewPublisherController extends Controller
{
    public function __invoke(Publisher $publisher)
    {
        return PublisherResource::make($publisher);
    }
}
