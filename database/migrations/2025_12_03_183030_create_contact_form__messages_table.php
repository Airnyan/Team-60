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
        Schema::create('contact_form_messages', function (Blueprint $table) {            
            // Table ID column
            $table->id();

            // Syntax for creating columns: $table->Datatype("ColumnName")->FutherModifiers();
            
            // Name column
            $table->string('name');

            // Email column
            $table->string('email');

            // Phone Number column
            // nullable makes it optional
            $table->string('mobile_number')->nullable();

            // Order Number column
            $table->string('order_number');

            // Message column
            $table->text('message');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_form__messages');
    }
};
