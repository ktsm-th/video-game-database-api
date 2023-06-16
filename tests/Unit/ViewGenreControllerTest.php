<?php

namespace Tests\Unit;

use App\Models\Genre;
use Tests\TestCase;


class ViewGenreControllerTest extends TestCase
{
    public function test_genre_is_returned(): void
    {
        // set up test data
        $genre = Genre::factory()->create();
        Genre::factory(5)->create();

        // make test call
        $this->getJson("/api/genres/{$genre->id}")
            ->assertJsonFragment([
                'id' => $genre->id,
            ])
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                ]
            ]);

        $this->assertDatabaseCount('genres', 6);
    }
}
