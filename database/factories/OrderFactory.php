<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => \app\Models\User::factory(),
            'address_id' => \app\Models\Address::factory(),
            'order_date' => now(),
            'status' =>  fake()->randomElement(['Pending', 'Fufilled',  'Awaiting Payment', 'Cancelled']),
        ];
    }
}
