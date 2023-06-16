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
        $console = Console::create($storeConsoleRequest->validated());
        return ConsoleResource::make($console);
    }
}
