<?php
namespace App\Repositories\Batch;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Batch\BatchRepositoryInterface;
use App\Repositories\Batch\BatchRepository;


class BatchRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
      $this->app->bind('App\Repositories\Batch\BatchRepositoryInterface', 'App\Repositories\Batch\BatchRepository');
  }
}
