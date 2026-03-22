<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a user and a product to link the reviews to
        $user = User::first();
        $product = Product::first();

        // If your database is empty, we stop here to prevent errors
        if (!$user || !$product) {
            return;
        }

        $reviews = [
            [
                'product_id' => $product->id,
                'user_id'    => $user->id,
                'rating'     => 5,
                'review'     => 'This is an amazing product! The quality of the Alien Matrix design is top-notch.',
            ],
            [
                'product_id' => $product->id,
                'user_id'    => $user->id,
                'rating'     => 4,
                'review'     => 'Really cool aesthetic, though the shipping took a little longer than expected.',
            ],
            [
                'product_id' => $product->id,
                'user_id'    => $user->id,
                'rating'     => 5,
                'review'     => 'Fits perfectly and the green glow effect looks great in person!',
            ],
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}