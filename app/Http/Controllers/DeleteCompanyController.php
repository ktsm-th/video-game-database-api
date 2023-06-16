<?php

namespace App\Http\Controllers;

use App\Models\Company;

class DeleteCompanyController extends Controller
{
    public function __invoke(Company $company)
    {
        $company->delete();
        return response('Deleted!', 200);
    }
}
