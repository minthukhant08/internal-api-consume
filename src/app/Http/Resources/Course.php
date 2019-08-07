<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CourseDetail as CourseDetailResource;

class Course extends JsonResource
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
          'id'      => $this->id,
          'name'    => $this->name,
          'image'   => url('/api/v1/courses/image').'/'.$this->id,
          'details' => CourseDetailResource::collection($this->details)
        ];
    }
}
