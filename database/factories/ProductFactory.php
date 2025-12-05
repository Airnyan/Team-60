<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\ProductType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_type_id' => ProductType::inRandomOrder()-value('id'),
            'product_name' => fake()->word(),
            'description' => fake()->words(10,true),
            'price' => fake()->numberBetween(40,60),
            'discounted_price' => fake()->numberBetween(20,40),
            'current_stock' => fake()->numberBetween(0,100),
        ];
    }
}
