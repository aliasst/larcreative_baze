<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => fake()->name,
           'surname' => fake()->lastName,
           'age' => fake()->numberBetween(18, 55),
           'email' => fake()->unique()->safeEmail,
           'description' => fake()->text(300),
           'is_married' => fake()->boolean,
            'position_id' => Position::inRandomOrder()->first()->id
        ];
    }
}
