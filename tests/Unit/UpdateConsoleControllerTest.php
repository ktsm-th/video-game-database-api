<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\Console;
use App\Models\Publisher;
use Tests\TestCase;

class UpdateConsoleControllerTest extends TestCase
{
    public function test_console_is_updated(): void
    {
       // set up test data
       $console = Console::factory()->create();
       $company = Company::factory()->create();

       $data = [
           'name' => 'test name',
           'description' => 'test-description',
           'image' => 'test-image-url',
           'release_date' => '2021-11-06',
           'company_id' => $company->id,
       ];

       // make test call
       $this->patchJson("/api/consoles/{$console->id}", $data)
       ->assertStatus(200)
       ->assertJsonFragment($data);
       $this->assertDatabaseHas("consoles", $data);
   }
}
