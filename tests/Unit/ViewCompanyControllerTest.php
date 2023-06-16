<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;


class ViewCompanyControllerTest extends TestCase
{
    public function test_company_is_returned(): void
    {
        // set up test data
        $company = Company::factory()->create();
        Company::factory(5)->create();

        // make test call
        $this->getJson("/api/companies/{$company->id}")
            ->assertJsonFragment([
                'id' => $company->id,
            ])
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'image',
                    'founding_date',
                ]
            ]);

        $this->assertDatabaseCount('companies', 6);
    }
}
