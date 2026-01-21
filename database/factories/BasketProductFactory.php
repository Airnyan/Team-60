<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Product;
use PhpParser\Node\Stmt\ElseIf_;

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
            'basket_id' => null,
            'product_id' => null,
            'quantity' => fake()->numberBetween(1,10),
            'price' =>  null
        ];
    }

    public function configure()
    {
        return parent::configure()->afterMaking(function (BasketProduct $basketProduct) {
            if(!$basketProduct->basket_id) {
                $basketProduct->basket_id = Basket::factory()->create()->id;
            }
            if(!$basketProduct->product_id) {
                $product = Product::factory()->create();
                $basketProduct->product_id = $product->id;
                $basketProduct->price = $product->price;
            } elseif(!$basketProduct->price) {
                $basketProduct->price = Product::find($basketProduct->product_id)->price;
            }
        });
    }
}
