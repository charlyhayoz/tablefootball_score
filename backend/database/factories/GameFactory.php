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
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $player = \App\Models\Player::all();
        $player1 = $player->random();
        $player = $player->filter(function ($item) use ($player1) {
            return $item->id != $player1->id;
        });

        return [
            'status' => GameStatus::FINISHED,
            'player1_id' => $player1->id,
            'player2_id' => $player->random()->id,
            'player1_score' => 10,
            'player2_score' => rand(0, 9),
            'created_at' =>  Carbon::now()->subDays(rand(0, 10)),
        ];
    }
}
