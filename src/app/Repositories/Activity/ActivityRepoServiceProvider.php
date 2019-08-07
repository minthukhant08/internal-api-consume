<?php
namespace App\Repositories\Activity;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Activity\ActivityRepositoryInterface;
use App\Repositories\Activity\ActivityRepository;


class ActivityRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    $this->app->bind('App\Repositories\Activity\ActivityRepositoryInterface', 'App\Repositories\Activity\ActivityRepository');
  }
}
