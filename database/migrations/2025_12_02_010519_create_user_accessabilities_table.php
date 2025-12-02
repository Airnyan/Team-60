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
        Schema::create('user_accessabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('Cascade');

            $table->enum('contrast_level', ['Default', 'High Contrast', 'Greyscale', 'Inverted'])->default('Default');
            $table->integer('font_size');
            $table->boolean('screen_reader');
            $table->boolean('magnify_toggle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_accessabilities');
    }
};
