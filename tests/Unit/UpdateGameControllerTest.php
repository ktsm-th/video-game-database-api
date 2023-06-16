<?php

namespace Tests\Unit;

use App\Models\Game;
use App\Models\Publisher;
use Tests\TestCase;

class UpdateGameControllerTest extends TestCase
{
    public function test_game_is_updated(): void
    {
       // set up test data
       $game = Game::factory()->create();
       $publisher = Publisher::factory()->create();

       $data = [
           'name' => 'test name',
           'description' => 'test-description',
           'image' => 'test-image-url',
           'release_date' => '2021-11-06',
           'publisher_id' => $publisher->id,
       ];

       // make test call
       $this->patchJson("/api/games/{$game->id}", $data)
       ->assertStatus(200)
       ->assertJsonFragment($data);
       $this->assertDatabaseHas("games", $data);
   }
}
