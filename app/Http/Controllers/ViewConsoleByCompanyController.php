<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsoleResource;
use App\Models\Console;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class ViewConsoleByCompanyController extends Controller
{
    public function __invoke(Company $company)
    {
        return ConsoleResource::collection($company->consoles);
    }
}
