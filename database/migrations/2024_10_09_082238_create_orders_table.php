<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->enum('event_category', ['Breakfast', 'Lunch', 'Dinner', 'Wedding', 'Birthday Party', 'Corporate Events', 'Family Get Together', 'Holiday Parties',]);
            $table->date('order_received_date');
            $table->enum('total_guest', ['500', '500-1000', '1000-2000']);
            $table->string('message');
            $table->enum('order_status', ['Preparing', 'Cooking', 'Out for Delivery', 'Packing'])->default('Preparing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
