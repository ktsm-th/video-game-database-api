<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class UpdateCompanyControllerTest extends TestCase
{
    public function test_company_is_updated(): void
    {
       // set up test data
       $company = Company::factory()->create();

       $data = [
           'name' => 'test name',
           'image' => 'test-image-url',
           'founding_date' => '2021-11-06',
       ];

       // make test call
       $this->patchJson("/api/companies/{$company->id}", $data)
       ->assertStatus(200)
       ->assertJsonFragment($data);
       $this->assertDatabaseHas("companies", $data);
   }
}
