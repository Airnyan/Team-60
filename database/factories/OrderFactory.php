<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\User;
use app\Models\Address;
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
            'user_id' => fn($User) => $User['user_id'] ?? User::factory(),
            'address_id' => fn($address) => $address['address_id'] ?? Address::factory(),
            'order_date' => now(), 
            'status' =>  fake()->randomElement(['Pending', 'Fufilled',  'Awaiting Payment', 'Cancelled']),
        ];
    }
}
