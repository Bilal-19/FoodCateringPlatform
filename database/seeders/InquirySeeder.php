<?php

namespace Database\Seeders;

use App\Models\CustomerInquiry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i <= 20; $i++) {
            $customer = new CustomerInquiry();
            $customer->customer_name = $faker->name;
            $customer->customer_email = $faker->email;
            $customer->customer_message = $faker->realText(50);
            $customer->save();
        }
    }
}
