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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  // Primary key for the order
            $table->decimal('subtotal', 10, 2);  // Subtotal amount
            $table->decimal('despatch_fee', 10, 2);  // Despatch fee
            $table->decimal('total', 10, 2);  // Total amount (including despatch fee)
            $table->enum('status', ['pending', 'completed', 'success', 'failed'])->default('pending');  // Order status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
