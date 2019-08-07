<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Batch;
use App\Course;

class BatchCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $batches = Batch::all()->pluck('id')->toArray();
      $courses = Course::all()->pluck('id')->toArray();
        foreach (range(1,10) as $index) {
            DB::table('batch_course')->insert([
              'batch_id' => $faker->randomElement($batches),
              'course_id' => $faker->randomElement($courses)
            ]);
          }
    }
}
