<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            $inventory = new Inventory();
            $inventory->item_name = $faker->userName;
            $inventory->item_category = $faker->randomElement([
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
            $inventory->item_variant = $faker->randomElement([
                'Organic',
                'Frozen',
                'Fresh',
                'Canned',
                'Processed',
                'Low-Fat',
                'Dehydrated',
                'Sweets and Sugars',
                'Pre-Cooked',
            ]);
            $inventory->item_quantity = $faker->numberBetween(1, 10);
            $inventory->item_quantity_unit = $faker->randomElement([
                'g (Grams)',
                'kg (Kilograms)',
                'mg (Milligrams)',
                'lb (Pounds)',
                'oz (Ounces)',
                'ml (Milliliters)',
                'L (Liters)',
                'dozen',
            ]);
            $inventory->item_purchase_date = $faker->date;
            $inventory->item_cost = $faker->numberBetween(100, 10000);
            $inventory->supplier_name = $faker->name;
            $inventory->supplier_contactno = $faker->phoneNumber();
            $inventory->save();
        }

    }
}
