<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class ViewCompanyController extends Controller
{
    public function __invoke(Company $company)
    {
        return CompanyResource::make($company);
    }
}
