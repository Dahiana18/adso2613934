<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image = fake()->image(public_path('images/'), 140, 140, null, false);
        return [
            'name' => fake()->unique()->word(),
            'image' => $image,
            'manufacturer' => fake()->company(),
            'releasedate' => fake()->dateTimeBetween('1974-01-01', '2024-12-31'),
            'description' => fake()->sentence(),
        ];
    }
}
