<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class StoreCompanyController extends Controller
{
    public function __invoke(StoreCompanyRequest $storeCompanyRequest)
    {
        $company = Company::create($storeCompanyRequest->validated());
        return CompanyResource::make($company);
    }
}
