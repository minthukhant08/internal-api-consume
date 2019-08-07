<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Activity;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $activities = Activity::all()->pluck('id')->toArray();
      $users = User::all()->pluck('id')->toArray();
        foreach (range(1,10) as $index) {
            DB::table('comment')->insert([
              'user_id' => $faker->randomElement($users),
              'descriptions' => $faker->sentence,
              'activity_id' => $faker->randomElement($activities),
              'created_at'  =>  now(),
              'updated_at'  =>  now()
            ]);
          }
    }
}
