<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsoleRequest;
use App\Http\Resources\ConsoleResource;
use App\Models\Console;
use Illuminate\Http\Request;

class StoreConsoleController extends Controller
{
    public function __invoke(StoreConsoleRequest $storeConsoleRequest)
    {
        $fileName = time() . '.' . $storeConsoleRequest->image->extension();
        $storeConsoleRequest->image->storeAs('public/images/consoles', $fileName);

        $console = Console::create(
            array_merge(
                $storeConsoleRequest->except('image'),
                [
                    'image' => asset('storage/images/consoles/' . $fileName),
                ],
            )
        );        return ConsoleResource::make($console);
    }
}
