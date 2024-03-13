<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' => fake()->paragraph(),
            'salary' => fake()->numberBetween(4_000, 50_0000),
            'experience' => fake()->randomElement(Job::$experience),
            'category' => fake()->randomElement(Job::$category)
        ];
    }
}
