<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GamePlayer>
 */
class GamePlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'player_id' => \App\Models\Player::all()->random()->id,
            'game_id' =>  \App\Models\Game::all()->random()->id,
            'score' => 0,
            'win' => 0
        ];
    }
}
