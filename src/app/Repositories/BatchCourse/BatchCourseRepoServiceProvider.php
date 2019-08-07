<?php
namespace App\Repositories\BatchCourse;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BatchCourse\BatchCourseRepositoryInterface;
use App\Repositories\BatchCourse\BatchCourseRepository;


class BatchCourseRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    $this->app->bind('App\Repositories\BatchCourse\BatchCourseRepositoryInterface', 'App\Repositories\BatchCourse\BatchCourseRepository');
  }
}
