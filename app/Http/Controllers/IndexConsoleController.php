<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsoleResource;
use App\Models\Console;
use Illuminate\Http\Request;

class IndexConsoleController extends Controller
{
    public function __invoke()
    {
        $console = Console::all();

        return ConsoleResource::collection($console);
    }
}
