<?php

namespace Database\Factories;

use App\Models\Basket;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Basket>
 */
class BasketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null
        ];
    }
    public function configure()
    {
        return parent::configure()->afterMaking(function (Basket $basket) {
            if(!$basket->user_id) {
                $basket->user_id = User::factory()->create()->id;
            }
        });
    }
}
