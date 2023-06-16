<?php

namespace Tests\Unit;

use App\Models\Genre;
use Tests\TestCase;

class DeleteGenreControllerTest extends TestCase
{
    public function test_genre_is_deleted(): void
    {
        // set up test data
        $genre = Genre::factory()->create();
        Genre::factory(5)->create();

        // make test call
        $this->deleteJson("/api/genres/{$genre->id}");

        $this->assertSoftDeleted('genres', ['id' => $genre->id]);
    }
}
