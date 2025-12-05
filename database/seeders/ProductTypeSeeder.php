<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_types')->insert([
            ['type_name' => 'T-shirt'],
            ['type_name' => 'Hoodie'],
            ['type_name' => 'Tracksuit'],
            ['type_name' => 'Hat'],
            ['type_name' => 'Poster'],           
        ]);
    }
}
