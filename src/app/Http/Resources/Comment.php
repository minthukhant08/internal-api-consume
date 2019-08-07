<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
          'id'             => $this->id,
          'descriptions'   => $this->descriptions,
          'activity_id'    => $this->activity_id,
          'user'           => [ 'id'    => $this->user->id,
                                'name'  => $this->user->name,
                                'image'  => url('/api/v1/users/image').'/'.$this->id,

          ]
        ];
    }
}
