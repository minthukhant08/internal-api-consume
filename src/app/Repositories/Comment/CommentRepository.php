<?php

namespace App\Repositories\Comment;

use App\Comment;
use App\Repositories\Comment\CommentRepositoryInterface as CommentInterface;

class CommentRepository implements CommentInterface
{
  public $comment;

  public function __construct(Comment $comment)
  {
     $this->comment = $comment;
  }

  public function getAll($offset, $limit, $activity_id)
  {
      if (isset($activity_id)) {
          return $this->comment::orderBy('created_at', 'desc')
                                ->where('activity_id', '=', $activity_id)
                                ->skip($offset)
                                ->take($limit)
                                ->get();
      }else {
          return $this->comment::orderBy('created_at', 'desc')
                                ->skip($offset)
                                ->take($limit)
                                ->get();
      }

  }

  public function find($id)
  {
      return $this->comment::with('user')->where('id', '=', $id)->first();
  }


  public function destroy($id)
  {
      return $this->comment::find($id)->delete();
  }

  public function total()
  {
      return $this->comment::count();
  }

  public function store($data)
  {
      $this->comment->fill($data);
      if ($this->comment->save()) {
          return $this->comment->id;
      }
  }

  public function delete($id)
  {
      $this->comment = $this->comment->find($id);
      $this->comment->softdelete();
  }

  public function update($request, $id)
  {
      $this->comment = $this->comment->find($id);
      $this->comment->fill($request);
      if ($this->comment->save()) {
          return true;
      }
  }

}
