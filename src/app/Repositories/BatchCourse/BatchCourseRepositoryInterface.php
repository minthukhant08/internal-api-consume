<?php
namespace App\Repositories\BatchCourse;

interface BatchCourseRepositoryInterface{
  public function find($id);
  public function store($data);
  public function delete($id);
}
