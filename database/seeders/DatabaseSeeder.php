<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UserAccessabilitySeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            AddressSeeder::class,
            ReviewSeeder::class,
            //BasketSeeder::class,
            //OrderSeeder::class
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         
        \App\Models\Review::create([
            'user_id' => 1,
            'product_id' => 1,
            'rating' => 5,
            'comment' => 'Great product!',
            ]);

            \App\Models\Review::create([
            'user_id' => 1,
            'product_id' => 2,
            'rating' => 4,
            'comment' => 'Really liked the quality.',
            ]);
    }
}
