<?php
namespace App\Repositories\Like;

interface LikeRepositoryInterface{
  public function getAll($offset, $limit);
  public function find($id);
  public function total();
  public function store($data);
  public function update($request, $id);
  public function delete($id);
}
