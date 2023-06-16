<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Request;

class StorePublisherController extends Controller
{
    public function __invoke(StorePublisherRequest $storePublisherRequest)
    {
        $publisher = Publisher::create($storePublisherRequest->validated());
        return PublisherResource::make($publisher);
    }
}
