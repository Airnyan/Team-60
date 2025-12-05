<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Order;
use app\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderProduct>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fn ($order) =>$order['order_id'] ?? Order::factory(),
            'product_id' => fn ($product) =>$product['product_id'] ?? Product::factory(),
            'quantity' => fake()->numberBetween(1,10),
        ];
    }
}
