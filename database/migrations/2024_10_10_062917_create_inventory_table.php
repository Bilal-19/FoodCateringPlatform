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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->string('item_name');
            $table->enum('item_category', [
                'Vegetables',
                'Meats',
                'Diary',
                'Grains',
                'Seafood',
                'Nuts and Seeds',
                'Fats and Oils',
                'Sweets and Sugars',
                'Beverages'
            ]);
            $table->enum('item_variant', [
                'Organic',
                'Frozen',
                'Fresh',
                'Canned',
                'Processed',
                'Low-Fat',
                'Dehydrated',
                'Sweets and Sugars',
                'Pre-Cooked'
            ]);
            $table->enum('item_quantity', [1, 2, 3, 4, 5, 6, 7, 8, 9, 20]);
            $table->enum('item_quantity_unit', [
                'g (Grams)',
                'kg (Kilograms)',
                'mg (Milligrams)',
                'lb (Pounds)',
                'oz (Ounces)',
                'ml (Milliliters)',
                'L (Liters)',
                'dozen',
            ]);
            $table->date('item_purchase_date');
            $table->integer('item_cost');
            $table->string('supplier_name');
            $table->string('supplier_contactno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
