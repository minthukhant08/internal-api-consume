<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface{
  public function getAll($offset, $limit, $activity_id);
  public function find($id);
  public function total();
  public function store($data);
  public function update($request, $id);
  public function delete($id);
}
