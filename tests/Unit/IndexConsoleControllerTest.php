<?php

namespace Tests\Unit;

use App\Models\Console;
use Tests\TestCase;

class IndexConsoleControllerTest extends TestCase
{
    public function test_all_consoles_are_returned(): void
    {
        // set up test data
        Console::factory(5)->create();

        // make test call
        $this->getJson('api/consoles')
            ->assertJsonCount(5, 'data') // perform assertions
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'image',
                        'release_date',
                        'company_id',
                    ]
                ]
            ]);
        $this->assertDatabaseCount('consoles', 5);
    }
}
