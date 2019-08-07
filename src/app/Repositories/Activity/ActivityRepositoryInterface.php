<?php
namespace App\Repositories\Activity;

interface ActivityRepositoryInterface{
  public function getAll($offset, $limit, $name, $speaker);
  public function find($id);
  public function total();
  public function store($data);
  public function update($request, $id);
  public function delete($id);
}
