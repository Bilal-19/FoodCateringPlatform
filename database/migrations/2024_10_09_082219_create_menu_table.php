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
        Schema::create('menu', function (Blueprint $table) {
            $table->id('menu_id');
            $table->string('item_image');
            $table->string('item_label');
            $table->enum('item_category',['Breakfast', 'Lunch', 'Dinner', 'Wedding', 'Birthday Party', 'Corporate Events', 'Family Get Together', 'Holiday Parties']);
            $table->integer('item_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
