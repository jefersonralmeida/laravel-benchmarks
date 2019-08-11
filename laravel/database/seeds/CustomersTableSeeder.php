<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {

        $data = [];
        foreach (range(0, 500) as $i) {
            $extraData[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
            ];
        }

        DB::table('customers')->insert($extraData);
    }
}
