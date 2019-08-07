<?php

namespace App\Repositories\Like;

use App\Like;
use App\Repositories\Like\LikeRepositoryInterface as LikeInterface;

class LikeRepository implements LikeInterface
{
  public $like;

  public function __construct(Like $like)
  {
     $this->like = $like;
  }

  public function getAll($offset, $limit){
    return $this->like::orderBy('created_at', 'desc')
        ->skip($offset)
        ->take($limit)
        ->get();
  }

  public function find($id)
  {
    return $this->like::where('id', '=', $id)->first();
  }

  public function destroy($id)
  {
    return $this->like::find($id)->delete();
  }

  public function total()
  {
    return $this->like::count();
  }

  public function store($data){
      $this->like->fill($data);
      if ($this->like->save()) {
        return $this->like->id;
      }
  }

  public function delete($id)
  {
    $this->like = $this->like->find($id);
    $this->like->softdelete();
  }

  public function update($request, $id)
  {
    $this->like = $this->like->find($id);
    $this->like->fill($request);
    $this->like->save;
  }
}
