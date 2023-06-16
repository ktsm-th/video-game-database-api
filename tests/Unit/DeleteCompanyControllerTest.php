<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class DeleteCompanyControllerTest extends TestCase
{
    public function test_company_is_deleted(): void
    {
        // set up test data
        $company = Company::factory()->create();
        Company::factory(5)->create();

        // make test call
        $this->deleteJson("/api/companies/{$company->id}");

        $this->assertSoftDeleted('companies', ['id' => $company->id]);
    }
}
