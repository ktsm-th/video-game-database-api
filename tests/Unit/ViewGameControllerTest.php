<?php

namespace Tests\Unit;

use App\Models\Game;
use Tests\TestCase;


class ViewGameControllerTest extends TestCase
{
    public function test_game_is_returned(): void
    {
        // set up test data
        $game = Game::factory()->create();
        Game::factory(5)->create();

        // make test call
        $this->getJson("/api/games/{$game->id}")
            ->assertJsonFragment([
                'id' => $game->id,
            ])
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'description',
                    'image',
                    'release_date',
                    'publisher_id',
                ]
            ]);

        $this->assertDatabaseCount('games', 6);
    }
}
