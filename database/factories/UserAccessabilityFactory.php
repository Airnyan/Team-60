<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserAccessability;

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
            'user_id' => null,
            'contrast_level' => fake()->randomElement(['Default', 'High Contrast', 'Greyscale', 'Inverted']),
            'font_size' => fake()->numberBetween(10,30),
            'screen_reader' => fake()->boolean(),
            'magnify_toggle' => fake()->boolean(),
        ];
    }
    public function configure()
    {
        return parent::configure()->afterMaking(function (UserAccessability $userAccessability) {
            if(!$userAccessability->user_id) {
                $userAccessability->user_id = User::factory()->create()->id;
            }
        });
    }
}
