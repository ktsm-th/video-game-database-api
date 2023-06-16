<?php

namespace Tests\Unit;

use App\Models\Game;
use Tests\TestCase;

class IndexGameControllerTest extends TestCase
{
    public function test_all_games_are_returned(): void
    {
        // set up test data
        Game::factory(5)->create();

        // make test call
        $this->getJson('api/games')
            ->assertJsonCount(5, 'data') // perform assertions
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'image',
                        'release_date',
                        'publisher_id',
                    ]
                ]
            ]);
        $this->assertDatabaseCount('games', 5);
    }
}
