<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       $course = null;
       $batch = null;

       if ($this->user_type == 1) {
           $this->user_type = "student";
       }else{
           $this->user_type = "teacher";
       }

       if ($this->gender == 1) {
           $this->gender = "male";
       }else{
           $this->gender = "female";
       }

       if ($this->course_id != null) {
           $course = ['id' => $this->course->id, 'name' => $this->course->name];
       }

       if ($this->batch_id  != null) {
           $batch  = ['id' => $this->batch->id, 'name' => $this->batch->name];
       }

       return [
         'id'            =>  $this->id,
         'name'          =>  $this->name,
         'email'         =>  $this->email,
         'gender'        =>  $this->gender,
         'date_of_birth' =>  $this->date_of_birth,
         'nrc_no'        =>  $this->nrc_no,
         'phone_no'      =>  $this->phone_no,
         'address'       =>  $this->address,
         'image'         =>  url('/api/v1/users/image').'/'.$this->id,
         'grade'         =>  $this->grade,
         'company'       =>  $this->company,
         'job'           =>  $this->job,
         'user_type'     =>  $this->user_type,
         'course'        =>  $course,
         'batch'         =>  $batch
       ];
    }
}
