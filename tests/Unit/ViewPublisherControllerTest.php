<?php

namespace Tests\Unit;

use App\Models\Publisher;
use Tests\TestCase;


class ViewPublisherControllerTest extends TestCase
{
    public function test_publisher_is_returned(): void
    {
        // set up test data
        $publisher = Publisher::factory()->create();
        Publisher::factory(5)->create();

        // make test call
        $this->getJson("/api/publishers/{$publisher->id}")
            ->assertJsonFragment([
                'id' => $publisher->id,
            ])
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'image',
                    'founding_date',
                ]
            ]);

        $this->assertDatabaseCount('publishers', 6);
    }
}
