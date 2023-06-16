<?php

namespace Tests\Unit;

use App\Models\Game;
use App\Models\Publisher;
use Tests\TestCase;

class StoreGameControllerTest extends TestCase
{
    public function test_game_can_be_created(): void
    {
        $publisher = Publisher::factory()->create();

        $data = [
            'name' => 'test name',
            'description' => 'test-description',
            'image' => 'test-image-url',
            'release_date' => '2021-11-06',
            'publisher_id' => $publisher->id,
        ];

        $this->postJson("/api/games/", $data)
        ->assertStatus(201)
        ->assertJsonFragment($data);
        $this->assertDatabaseHas("games", $data);
    }
}
