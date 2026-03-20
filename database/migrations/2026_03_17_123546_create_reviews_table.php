<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        // foreignId creates a column that links to other tables
        $table->foreignId('product_id')->constrained('products'); 
        $table->foreignId('user_id')->constrained('users');
        
        $table->integer('rating'); // To store 1-5 stars
        $table->text('review');    // To store the actual message
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
