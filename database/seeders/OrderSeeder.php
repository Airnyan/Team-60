<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory()->count(10)->has(OrderProduct::factory(3), 'products')->create();
    }
}