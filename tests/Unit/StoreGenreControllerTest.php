<?php

namespace Tests\Unit;

use App\Models\Genre;
use App\Models\Publisher;
use Tests\TestCase;

class StoreGenreControllerTest extends TestCase
{
    public function test_genre_can_be_created(): void
    {
        $publisher = Publisher::factory()->create();

        $data = [
            'name' => 'test name',
            'description' => 'test-description',
        ];

        $this->postJson("/api/genres/", $data)
        ->assertStatus(201)
        ->assertJsonFragment($data);
        $this->assertDatabaseHas("genres", $data);
    }
}
