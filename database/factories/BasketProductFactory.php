<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Basket;
use app\Models\Product;
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
            'basket_id' => fn($basket) => $basket['basket_id'] ??Basket::factory(),
            'product_id' => fn($product) => $product['product_id'] ??Product::factory(),
            'quantity' => fake()->numberBetween(1,10),
        ];
    }
}
