<?php

namespace App\Repositories\Course;

use App\Course;
use App\Repositories\Course\CourseRepositoryInterface as CourseInterface;

class CourseRepository implements CourseInterface
{
  public $course;

  public function __construct(Course $course)
  {
     $this->course = $course;
  }

  public function getAll($offset, $limit){
    return $this->course::with('details')->orderBy('created_at', 'desc')
        ->skip($offset)
        ->take($limit)
        ->get();
  }

  public function find($id)
  {
    return $this->course::with('details')->where('id', '=', $id)->first();
  }

  public function destroy($id)
  {
    return $this->course::find($id)->delete();
  }

  public function total()
  {
    return $this->course::count();
  }

  public function store($data){
      $this->course->fill($data);
      if ($this->course->save()) {
          return $this->course->id;
      }
  }

  public function delete($id)
  {
    $this->course = $this->course->find($id);
    $this->course->softdelete();
  }

  public function update($request, $id)
  {
    $this->course = $this->course->find($id);
    $this->course->fill($request);
    if ($this->course->save()) {
        return true;
    };
  }
}
