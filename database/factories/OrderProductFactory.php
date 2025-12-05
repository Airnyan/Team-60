<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
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
            'order_id' => null,
            'product_id' => null,
            'quantity' => fake()->numberBetween(1,10),
        ];
    }

    public function configure()
    {
        return parent::configure()->afterMaking(function (OrderProduct $orderProduct) {
            if(!$orderProduct->order_id) {
                $orderProduct->order_id = Order::factory()->create()->id;
            }
            if(!$orderProduct->product_id) {
                $orderProduct->product_id =  Product::factory()->create()->id;
            }
        });
    }
}
