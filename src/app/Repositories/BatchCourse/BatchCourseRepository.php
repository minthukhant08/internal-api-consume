<?php

namespace App\Repositories\BatchCourse;

use App\BatchCourse;
use App\Repositories\BatchCourse\BatchCourseRepositoryInterface as BatchCourseInterface;

class BatchCourseRepository implements BatchCourseInterface
{
  public $batchCourse;

  public function __construct(BatchCourse $batchCourse)
  {
     $this->batchCourse = $batchCourse;
  }

  public function find($id)
  {
    return $this->batchCourse::where('id', '=', $id)->first();
  }

  public function destroy($id)
  {
    return $this->batchCourse::find($id)->delete();
  }

  public function store($data){
      $this->batchCourse->fill($data);
      if ($this->batchCourse->save()) {
        return $this->batchCourse->id;
      }
  }

  public function delete($id)
  {
    $this->batchCourse = $this->batchCourse->find($id);
    $this->batchCourse->softdelete();
  }

}
