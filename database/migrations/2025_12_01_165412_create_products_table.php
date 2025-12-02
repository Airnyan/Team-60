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
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                     // Product ID
            $table->string('name');                           // Product name
            $table->text('description')->nullable();          // Description
            $table->decimal('price', 8, 2);                   // Price (e.g. 19.99)
            $table->string('size')->nullable();               // Size (optional)
            $table->string('category')->nullable();           // Category (hoodie, t-shirt, etc.)
            $table->string('image')->nullable();              // Image filename or URL
            $table->timestamps();                             // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
