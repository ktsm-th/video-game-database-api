<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class UpdateCompanyController extends Controller
{
    public function __invoke(Company $company, UpdateCompanyRequest $updateCompanyRequest)
    {
        $company->update($updateCompanyRequest->validated());
        return CompanyResource::make($company);
    }
}
