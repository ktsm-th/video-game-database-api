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
        $fileName = time() . '.' . $storeCompanyRequest->image->extension();
        $storeCompanyRequest->image->storeAs('public/images/companies', $fileName);

        $company = Company::create(
            array_merge(
                $storeCompanyRequest->except('image'),
                [
                    'image' => asset('storage/images/companies/' . $fileName),
                ],
            )
        );        return CompanyResource::make($company);
    }
}
