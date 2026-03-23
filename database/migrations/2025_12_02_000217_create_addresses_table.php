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
    Schema::create('addresses', function (Blueprint $table) {
        $table->id();
        // This adds the user_id column and connects it to the users table
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        
        $table->string('address_line_1');
        $table->string('address_line_2')->nullable(); // Good practice to make line 2 optional
        $table->string('postcode', 12);
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('addresses');
}
};
