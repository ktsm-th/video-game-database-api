<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class IndexCompanyControllerTest extends TestCase
{
    public function test_all_companies_are_returned(): void
    {
        // set up test data
        Company::factory(5)->create();

        // make test call
        $this->getJson('api/companies')
            ->assertJsonCount(5, 'data') // perform assertions
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'image',
                        'founding_date',
                    ]
                ]
            ]);
        $this->assertDatabaseCount('companies', 5);
    }
}
