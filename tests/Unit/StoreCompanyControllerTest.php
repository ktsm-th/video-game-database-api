<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;

class StoreCompanyControllerTest extends TestCase
{
    public function test_company_can_be_created(): void
    {

        $data = [
            'name' => 'test name',
            'image' => 'test-image-url',
            'founding_date' => '2021-11-06',
        ];

        $this->postJson("/api/companies/", $data)
        ->assertStatus(201)
        ->assertJsonFragment($data);
        $this->assertDatabaseHas("companies", $data);
    }
}
