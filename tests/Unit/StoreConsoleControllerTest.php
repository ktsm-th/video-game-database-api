<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Console;
use Tests\TestCase;

class StoreConsoleControllerTest extends TestCase
{
    public function test_console_can_be_created(): void
    {
        $company = Company::factory()->create();

        $data = [
            'name' => 'test name',
            'description' => 'test-description',
            'image' => 'test-image-url',
            'release_date' => '2021-11-06',
            'company_id' => $company->id,
        ];

        $this->postJson("/api/consoles/", $data)
        ->assertStatus(201)
        ->assertJsonFragment($data);
        $this->assertDatabaseHas("consoles", $data);
    }
}
