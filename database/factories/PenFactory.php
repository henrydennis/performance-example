<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pen>
 */
class PenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['ballpoint', 'fountain', 'marker']),
            'color' => $this->faker->randomElement(['black', 'blue', 'red']),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'user_id' => User::factory(),
        ];
    }
}
