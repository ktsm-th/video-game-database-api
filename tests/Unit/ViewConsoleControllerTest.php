<?php

namespace Tests\Unit;

use App\Models\Console;
use Tests\TestCase;


class ViewConsoleControllerTest extends TestCase
{
    public function test_console_is_returned(): void
    {
        // set up test data
        $console = Console::factory()->create();
        Console::factory(5)->create();

        // make test call
        $this->getJson("/api/consoles/{$console->id}")
            ->assertJsonFragment([
                'id' => $console->id,
            ])
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                    'image',
                    'release_date',
                    'company_id',
                ]
            ]);

        $this->assertDatabaseCount('consoles', 6);
    }
}
