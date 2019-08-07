<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourseTableSeeder::class);
        $this->call(CourseDetailTableSeeder::class);
        $this->call(BatchTableSeeder::class);
        $this->call(BatchCourseTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(LikeTableSeeder::class);
    }
}
