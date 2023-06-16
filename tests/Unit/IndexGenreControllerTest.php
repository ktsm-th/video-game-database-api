<?php

namespace Tests\Unit;

use App\Models\Genre;
use Tests\TestCase;

class IndexGenreControllerTest extends TestCase
{
    public function test_all_genres_are_returned(): void
    {
        // set up test data
        Genre::factory(5)->create();

        // make test call
        $this->getJson('/api/genres')
            ->assertJsonCount(5, 'data') // perform assertions
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                    ]
                ]
            ]);
        $this->assertDatabaseCount('genres', 5);
    }
}
