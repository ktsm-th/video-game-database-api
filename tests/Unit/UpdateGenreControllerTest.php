<?php

namespace Tests\Unit;

use App\Models\Genre;
use Tests\TestCase;

class UpdateGenreControllerTest extends TestCase
{
    public function test_genre_is_updated(): void
    {
       // set up test data
       $genre = Genre::factory()->create();

       $data = [
           'name' => 'test name',
           'description' => 'test-description',
       ];

       // make test call
       $this->patchJson("/api/genres/{$genre->id}", $data)
       ->assertStatus(200)
       ->assertJsonFragment($data);
       $this->assertDatabaseHas("genres", $data);
   }
}
