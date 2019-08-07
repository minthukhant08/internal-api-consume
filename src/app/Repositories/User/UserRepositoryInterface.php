<?php
namespace App\Repositories\User;

interface UserRepositoryInterface{
  public function getAll($offset, $limit, $user_type, $name, $course, $batch, $gender);
  public function find($id);
  public function findByEmail($email);
  public function total();
  public function store($data);
  public function update($request, $id);
  public function delete($id);
}
