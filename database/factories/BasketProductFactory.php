<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BasketProduct>
 */
class BasketProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'basket_id' => \app\Models\Basket::factory(),
            'product_id' => \app\Models\Product::factory(),
            'quantity' => fake()->numberBetween(1,10),
        ];
    }
}
