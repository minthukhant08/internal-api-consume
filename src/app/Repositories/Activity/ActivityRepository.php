<?php

namespace App\Repositories\Activity;

use App\Activity;
use App\Repositories\Activity\ActivityRepositoryInterface as ActivityInterface;

class ActivityRepository implements ActivityInterface
{
  public $activity;

  public function __construct(Activity $activity)
  {
     $this->activity = $activity;
  }

  public function getAll($offset, $limit, $name, $speaker){
    return $this->activity::with('likes')->orderBy('created_at', 'desc')
        ->where([
          ['name','like', '%'.$name.'%'],
          ['speaker_name','like', '%'.$speaker.'%']
        ])
        ->skip($offset)
        ->take($limit)
        ->get();
  }

  public function find($id)
  {
    return $this->activity::with('likes')->where('id', '=', $id)->first();
  }

  public function destroy($id)
  {
    return $this->activity::find($id)->delete();
  }

  public function total()
  {
    return $this->activity::count();
  }

  public function store($data){
      $this->activity->fill($data);
      if ($this->activity->save()) {
        return $this->activity->id;
      }
  }

  public function delete($id)
  {
    $this->activity = $this->activity->find($id);
    $this->activity->softdelete();
  }

  public function update($request, $id)
  {
    $this->activity = $this->activity->find($id);
    $this->activity->fill($request);
    if ($this->activity->save()) {
        return true;
    }
  }
}
