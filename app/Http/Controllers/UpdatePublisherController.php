<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePublisherRequest;
use App\Http\Resources\PublisherResource;
use App\Models\Publisher;
use Illuminate\Http\Request;

class UpdatePublisherController extends Controller
{
    public function __invoke(Publisher $publisher, UpdatePublisherRequest $updatePublisherRequest)
    {
        $publisher->update($updatePublisherRequest->validated());
        return PublisherResource::make($publisher);
    }
}
