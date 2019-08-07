<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Activity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id'            => $this->id,
          'name'          => $this->name,
          'remarks'       => $this->remarks,
          'date'          => $this->date,
          'speaker'       => $this->speaker_name,
          'descriptions'  => $this->descriptions,
          'image'         => url('/api/v1/activities/image').'/'.$this->id,
          'likes'         => $this->likes->count(),
          'comments'      => url('/api/v1/comments?activity_id=').$this->id
        ];
    }
}
