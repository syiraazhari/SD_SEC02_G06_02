<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create();
    }

    private function create()
    {
        $faker = Factory::create();

        return DB::table('customer_completed')->insert([
            'customer_id' => $faker->text(10),
            'first_name' => $faker->text(10),
            'last_name' => $faker->text(10),
            'last_name' => $faker->text(10),
            'email' => $faker->text(10),
            'phone_number' => $faker->text(10),
            'total_price' => $faker->numberBetween($min = 20, $max = 500),
            'sum_cost' => $faker->numberBetween($min = 50, $max = 1000),
            'menu_name' => $faker->text(10),
            'quantity' => $faker->numberBetween($min = 1, $max = 10),
            'customer_table' => '1',
            'completed_at' =>  '2022-11-12'
        ]);
    }
}