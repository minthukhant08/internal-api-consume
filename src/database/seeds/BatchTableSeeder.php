<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('batch')->insert([
              'name' => $faker->name,
              'start_date' => $faker->date('Y-m-d', now()),
              'end_date' => $faker->date('Y-m-d', strtotime('+3 Months')),
              'created_at'  =>  now(),
              'updated_at'  =>  now()
            ]);
          }
    }
}
