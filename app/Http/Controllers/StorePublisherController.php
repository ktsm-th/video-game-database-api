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
        $fileName = time() . '.' . $storePublisherRequest->image->extension();
        $storePublisherRequest->image->storeAs('public/images/publishers', $fileName);

        $publisher = Publisher::create(
            array_merge(
                $storePublisherRequest->except('image'),
                [
                    'image' => asset('storage/images/publishers/' . $fileName),
                ],
            )
        );        return PublisherResource::make($publisher);
    }
}
