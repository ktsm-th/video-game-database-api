<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsoleResource;
use App\Models\Console;
use Illuminate\Http\Request;

class ViewConsoleController extends Controller
{
    public function __invoke(Console $console)
    {
        return ConsoleResource::make($console);
    }
}
