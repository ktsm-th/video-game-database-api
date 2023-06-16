<?php

namespace Tests\Unit;

use App\Models\Game;
use Tests\TestCase;

class DeleteGameControllerTest extends TestCase
{
    public function test_game_is_deleted(): void
    {
        // set up test data
        $game = Game::factory()->create();
        Game::factory(5)->create();

        // make test call
        $this->deleteJson("/api/games/{$game->id}");

        $this->assertSoftDeleted('games', ['id' => $game->id]);
    }
}
