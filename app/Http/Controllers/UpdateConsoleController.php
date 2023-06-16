<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConsoleRequest;
use App\Http\Resources\ConsoleResource;
use App\Models\Console;
use Illuminate\Http\Request;

class UpdateConsoleController extends Controller
{
    public function __invoke(Console $console, UpdateConsoleRequest $updateConsoleRequest)
    {
        $console->update($updateConsoleRequest->validated());
        return ConsoleResource::make($console);
    }
}
