<?php

namespace Tests\Unit;

use App\Models\Publisher;
use Tests\TestCase;

class IndexPublisherControllerTest extends TestCase
{
    public function test_all_publishers_are_returned(): void
    {
        // set up test data
        Publisher::factory(5)->create();

        // make test call
        $this->getJson('api/publishers')
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
        $this->assertDatabaseCount('publishers', 5);
    }
}
