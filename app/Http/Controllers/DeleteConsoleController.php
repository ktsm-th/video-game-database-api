<?php

namespace App\Http\Controllers;

use App\Models\Console;

class DeleteConsoleController extends Controller
{
    public function __invoke(Console $console)
    {
        $console->delete();
        return response('Deleted!', 200);
    }
}
