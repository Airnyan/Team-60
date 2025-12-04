<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAccessability>
 */
class UserAccessabilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \app\Models\User::factory(),
            'contrast_level' => fake()->randomElement(['Default', 'High Contrast', 'Greyscale', 'Inverted']),
            'font_size' => fake()->numberBetween(10,30),
            'screen_reader' => fake()->boolean(),
            'magnify_toggle' => fake()->boolean(),
        ];
    }
}
