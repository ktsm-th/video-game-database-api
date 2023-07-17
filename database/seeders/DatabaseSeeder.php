<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Console;
use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Game::factory()->create([
            'name' => 'Guitar Hero'
        ]);
        Game::factory()->create([
            'name' => 'Lego Star Wars'
        ]);
        Game::factory()->create([
            'name' => 'Stardew Valley'
        ]);
        Game::factory()->create([
            'name' => 'Minecraft'
        ]);
        Game::factory()->create([
            'name' => 'Wii Fit'
        ]);

        Console::factory()->create([
            'name' => 'Nintendo 64'
        ]);
        Console::factory()->create([
            'name' => 'Nintendo Wii'
        ]);
        Console::factory()->create([
            'name' => 'PlayStation 2'
        ]);
        Console::factory()->create([
            'name' => 'Sega Megadrive'
        ]);
        Console::factory()->create([
            'name' => 'Nintendo GameCube'
        ]);

        Genre::factory()->create([
            'name'=>'Platformer'
        ]);
        Genre::factory()->create([
            'name'=>'First Person Shooter'
        ]);
        Genre::factory()->create([
            'name'=>'Horror'
        ]);
        Genre::factory()->create([
            'name'=>'Simulator'
        ]);
        Genre::factory()->create([
            'name'=>'Open World'
        ]);


        $games = Game::all();

        $consoles = Console::all();

        $genres = Genre::all();

        $games->each(function ($game) use ($consoles, $genres) {
            $game->consoles()->attach($consoles->random(2));
            $game->genres()->attach($genres->random(2));
        });
    }
}
