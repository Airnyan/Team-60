<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Address;
use App\Models\Order;

use function Symfony\Component\Clock\now;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'address_id' => null, 
            'order_date' => now(), 
            'status' =>  fake()->randomElement(['Pending', 'Fufilled',  'Awaiting Payment', 'Cancelled']),
        ];
    }

    public function configure()
    {
        return parent::configure()->afterMaking(function (Order $order) {
            if(!$order->user_id) {
                $order->user_id = User::factory()->create()->id;
            }
            if(!$order->address_id) {
                $order->address_id = Address::factory()->create()->id;
            }
        });
    }
}
