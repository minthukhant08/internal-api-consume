<?php

namespace App\Repositories\CourseDetail;

use App\CourseDetail;
use App\Repositories\CourseDetail\CourseDetailRepositoryInterface as CourseDetailInterface;

class CourseDetailRepository implements CourseDetailInterface
{
  public $courseDetail;

  public function __construct(CourseDetail $courseDetail)
  {
     $this->courseDetail = $courseDetail;
  }


  public function find($id)
  {
    return $this->courseDetail::with('course')->where('id', '=', $id)->first();
  }

  public function destroy($id)
  {
    return $this->courseDetail::find($id)->delete();
  }

  public function store($data){
      $this->courseDetail->fill($data);
      if ($this->courseDetail->save()) {
        return $this->courseDetail->id;
      }
  }

  public function delete($id)
  {
    $this->courseDetail = $this->courseDetail->find($id);
    $this->courseDetail->softdelete();
  }

  public function update($request, $id)
  {
    $this->courseDetail = $this->courseDetail->find($id);
    $this->courseDetail->fill($request);
    if ($this->courseDetail->save()) {
        return true;
    };
  }
}
