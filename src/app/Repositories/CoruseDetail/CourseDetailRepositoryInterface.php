<?php
namespace App\Repositories\CourseDetail;

interface CourseDetailRepositoryInterface{
  public function find($id);
  public function store($data);
  public function update($request, $id);
  public function delete($id);
}
