<?php

namespace Database\Seeders;

use App\Models\Basket;
use App\Models\BasketProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Basket::factory()->count(1)->has(BasketProduct::factory(3), 'basket_product')->create();
    }
}
