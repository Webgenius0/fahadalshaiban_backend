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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();  // Primary key for the order item
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // Foreign key to orders table
            $table->integer('signage_id');  // Signage ID
            $table->string('name');  // Name of the signage
            $table->string('location');  // Location of the signage
            $table->string('category_name');  // Category of the signage
            $table->decimal('price_per_day', 10, 2);  // Price per day for this signage
            $table->string('rotation_time');  // Rotation time for this signage
            $table->integer('avg_daily_views');  // Average daily views of this signage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
