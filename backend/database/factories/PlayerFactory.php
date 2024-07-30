<?php

namespace Database\Factories;

use App\Helper\Avatar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pseudo' => fake()->name(),
            'avatar' =>  Avatar::getRandomAvatar(),
        ];
    }
}
