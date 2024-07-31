<?php

namespace Database\Factories;

use App\Helper\GameStatus;
use App\Models\GamePlayer;
use Carbon\Carbon;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterMaking(function (Game $game) {
            // ...
        })->afterCreating(function (Game $game) {
            $player = \App\Models\Player::all();

            GamePlayer::factory()->create([
                'score' => 10,
                'player_id' => $player->random()->id,
                'game_id' => $game->id,
                'win' => 1
            ]);
            GamePlayer::factory()->create([
                'score' => rand(0, 9),
                'player_id' => $player->random()->id,
                'game_id' => $game->id,
                'win' => -1
            ]);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => GameStatus::FINISHED,
            'created_at' =>  Carbon::now()->subDays(rand(0, 10)),
        ];
    }
}
