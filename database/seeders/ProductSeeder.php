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
        
        //--------------------T-shirts--------------------------
        Product::create([
            'product_type_id' => 1, 
            'product_name' => 'Alien Matrix T-Shirt (Green)',
            'description' => 'Black t-shirt featuring a green alien profile and digital rain.',
            'price' => 25.00,
            'discounted_price' => 18.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid1.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Alien Defender T-Shirt (Red Swarm)',
            'description' => 'Black t-shirt featuring a green alien fighting off a red alien swarm.',
            'price' => 25.00,
            'discounted_price' => 18.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid2.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Alien Defender T-Shirt (Purple Swarm)',
            'description' => 'Black t-shirt featuring an orange alien fighting off a purple alien swarm.',
            'price' => 25.00,
            'discounted_price' => 18.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid3.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Alien Matrix T-Shirt (Blue)',
            'description' => 'Black t-shirt featuring a blue alien profile and digital rain.',
            'price' => 25.00,
            'discounted_price' => 18.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid4.png'
        ]);

        Product::create([
            'product_type_id' => 1,
            'product_name' => 'Alien Defender T-Shirt (Blue Edition)',
            'description' => 'Blue t-shirt featuring a cyan alien fighting off a red alien swarm.',
            'price' => 25.00,
            'discounted_price' => 18.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid5.png'
        ]);

        //--------------------Hoodies--------------------------

        Product::create([
            'product_type_id' => 2,
            'product_name' => 'Alien Defender Hoodie (White)',
            'description' => 'White pullover hoodie featuring a green alien defending against a yellow swarm.',
            'price' => 45.00,
            'discounted_price' => 35.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid6.png'
        ]);

        Product::create([
            'product_type_id' => 2,
            'product_name' => 'Alien Defender Hoodie (Red)',
            'description' => 'Red pullover hoodie featuring a green alien defending against a yellow swarm.',
            'price' => 45.00,
            'discounted_price' => 35.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid7.png'
        ]);

        Product::create([
            'product_type_id' => 2,
            'product_name' => 'Alien Defender Hoodie (Blue)',
            'description' => 'Blue pullover hoodie featuring a green alien defending against a yellow swarm.',
            'price' => 45.00,
            'discounted_price' => 35.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid8.png'
        ]);
        
        Product::create([
            'product_type_id' => 2,
            'product_name' => 'Alien Defender Hoodie (Yellow)',
            'description' => 'Yellow pullover hoodie featuring a teal alien defending against a blue swarm.',
            'price' => 45.00,
            'discounted_price' => 35.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid9.png'
        ]);

        Product::create([
            'product_type_id' => 2,
            'product_name' => 'Alien Defender Hoodie (Green)',
            'description' => 'Green pullover hoodie featuring a green alien defending against a yellow swarm.',
            'price' => 45.00,
            'discounted_price' => 35.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid10.png'
        ]);

        //--------------------Hats--------------------------

        Product::create([
            'product_type_id' => 4,
            'product_name' => 'Alien Defender Beanie (Maroon)',
            'description' => 'Maroon knit beanie hat featuring a cyan alien swarm graphic.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid11.png'
        ]);

        Product::create([
            'product_type_id' => 4,
            'product_name' => 'Alien Defender Beanie (White)',
            'description' => 'White knit beanie hat featuring a purple alien swarm graphic.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid12.png'
        ]);

        Product::create([
            'product_type_id' => 4,
            'product_name' => 'Alien Defender Beanie (Navy)',
            'description' => 'Navy blue knit beanie hat featuring a red alien swarm graphic.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid13.png'
        ]);

        Product::create([
            'product_type_id' => 4,
            'product_name' => 'Alien Defender Beanie (Yellow)',
            'description' => 'Mustard yellow knit beanie hat featuring a blue alien swarm graphic.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid14.png'
        ]);

        Product::create([
            'product_type_id' => 4,
            'product_name' => 'Alien Defender Beanie (Green)',
            'description' => 'Dark green knit beanie hat featuring a red alien swarm graphic.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid15.png'
        ]);

        //--------------------Tracksuits--------------------------

        Product::create([
            'product_type_id' => 3,
            'product_name' => 'Alien Defender Tracksuit (Yellow)',
            'description' => 'Yellow two-piece set including a zip-up jacket and matching joggers with an alien graphic.',
            'price' => 65.00,
            'discounted_price' => 50.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid16.png'
        ]);

        Product::create([
            'product_type_id' => 3,
            'product_name' => 'Alien Defender Tracksuit (Red)',
            'description' => 'Red two-piece set including a zip-up jacket and matching joggers with an alien graphic.',
            'price' => 65.00,
            'discounted_price' => 50.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid17.png'
        ]);

        Product::create([
            'product_type_id' => 3,
            'product_name' => 'Alien Defender Tracksuit (Navy)',
            'description' => 'Navy blue two-piece set including a zip-up jacket and matching joggers with an alien graphic.',
            'price' => 65.00,
            'discounted_price' => 50.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid18.png'
        ]);

        Product::create([
            'product_type_id' => 3,
            'product_name' => 'Alien Defender Tracksuit (White)',
            'description' => 'White two-piece set including a zip-up jacket and matching joggers with an alien graphic.',
            'price' => 65.00,
            'discounted_price' => 50.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid19.png'
        ]);

        Product::create([
            'product_type_id' => 3,
            'product_name' => 'Alien Defender Tracksuit (Purple)',
            'description' => 'Purple two-piece set including a zip-up jacket and matching joggers with an alien graphic.',
            'price' => 65.00,
            'discounted_price' => 50.00,
            'current_stock' => 10,
            'size' => 'S',
            'image' => 'images/items/grid20.png'
        ]);

        //--------------------Posters--------------------------

        Product::create([
            'product_type_id' => 5,
            'product_name' => 'Galactic Swarm Blockers Poster (Purple)',
            'description' => 'Retro space poster featuring a green alien defending against a red swarm on a purple background.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid21.png'
        ]);

        Product::create([
            'product_type_id' => 5,
            'product_name' => 'Galactic Swarm Blockers Poster (Green)',
            'description' => 'Retro space poster featuring a blue alien defending against an orange swarm on a green background.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid22.png'
        ]);

        Product::create([
            'product_type_id' => 5,
            'product_name' => 'Galactic Swarm Blockers Poster (Black)',
            'description' => 'Classic vector-style poster featuring a green alien defending against a red swarm on a black background.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid23.png'
        ]);

        Product::create([
            'product_type_id' => 5,
            'product_name' => 'Galactic Swarm Blockers Poster (Cosmic Red Swarm)',
            'description' => 'Detailed sci-fi poster with planets and rockets, featuring a blue alien battling a red swarm.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid24.png'
        ]);

        Product::create([
            'product_type_id' => 5,
            'product_name' => 'Galactic Swarm Blockers Poster (Cosmic Green Swarm)',
            'description' => 'Detailed sci-fi poster with planets and rockets, featuring a blue alien battling a green swarm.',
            'price' => 15.00,
            'discounted_price' => 10.00,
            'current_stock' => 10,
            'size' => 'One Size',
            'image' => 'images/items/grid25.png'
        ]);

    }
    
    
} 



