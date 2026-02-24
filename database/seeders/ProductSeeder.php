<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        // Manually seeding the product table - kamalpreet
        // Keep in mind that this type is linked to product type table in a way where producty_id defines its type
        // ID 1 = T-shirt ID 2 = Hoodie ID 3 = Tracksuit ID 4 = Hat ID 5 = Poster
        Product::create([
            'product_type_id' => 1, 
            'product_name' => 'Product 1',
            'description' => 'Description 1',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid1.png' 
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 2',
            'description' => 'Description 2',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid2.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 3',
            'description' => 'Description 3',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid3.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 4',
            'description' => 'Description 4',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid4.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 5',
            'description' => 'Description 5',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid5.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 6',
            'description' => 'Description 6',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid6.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 7',
            'description' => 'Description 7',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid7.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 8',
            'description' => 'Description 8',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid8.png'
        ]);
        
        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 9',
            'description' => 'Description 9',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid9.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Product 10',
            'description' => 'Description 10',
            'price' => 25.00,
            'discounted_price' => 12.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'grid10.png'
        ]);

    }
    
    
} 



