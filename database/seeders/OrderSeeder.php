<?php

namespace Database\Seeders;

use App\Models\Orders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 20; $i++) {
            $order = new Orders();
            $order->customer_name = $faker->name();
            $order->customer_email = $faker->email();
            $order->event_category = $faker->randomElement(['Breakfast', 'Lunch', 'Dinner', 'Wedding', 'Birthday Party', 'Corporate Events', 'Family Get Together', 'Holiday Parties']);
            $order->order_received_date = $faker->date();
            $order->total_guest = $faker->randomElement(['500', '500-1000', '1000-2000']);
            $order->message = $faker->text(25);
            $order->order_status = $faker->randomElement(['Preparing', 'Cooking', 'Out for Delivery', 'Packing']);
            $order->save();
        }

    }
}
