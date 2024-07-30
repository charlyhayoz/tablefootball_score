<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Game;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Player::factory()->count(20)->create();
        Game::factory()->count(100)->create();
    }
}
