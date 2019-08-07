<?php

namespace App\Repositories\Batch;

use App\Batch;
use App\Repositories\Batch\BatchRepositoryInterface as BatchInterface;

class BatchRepository implements BatchInterface
{
  public $batch;

  public function __construct(Batch $batch)
  {
     $this->batch = $batch;
  }

  public function getAll($offset, $limit){
    return $this->batch::with('courses')->orderBy('created_at', 'desc')
        ->skip($offset)
        ->take($limit)
        ->get();
  }

  public function find($id)
  {
    return $this->batch::with('users')->where('id', '=', $id)->first();
  }

  public function destroy($id)
  {
    return $this->batch::find($id)->delete();
  }

  public function total()
  {
    return $this->batch::count();
  }

  public function store($data){
      $this->batch->fill($data);
      if ($this->batch->save()) {
        return $this->batch;
      }
  }

  public function delete($id)
  {
    $this->batch = $this->batch->find($id);
    $this->batch->softdelete();
  }

  public function update($request, $id)
  {
    $this->batch = $this->batch->find($id);
    $this->batch->fill($request);
    if ($this->batch->save()) {
        return $this->batch;
    }
  }
}
