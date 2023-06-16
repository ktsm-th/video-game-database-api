<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class IndexCompanyController extends Controller
{
    public function __invoke()
    {
        $company = Company::all();

        return CompanyResource::collection($company);
    }
}
