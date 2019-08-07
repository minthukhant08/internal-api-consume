<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $table = 'course_detail';
    protected $fillable = [
        'course_id', 'topic', 'descriptions'
    ];

    public function course()
    {
      return $this->belongsTo(Course::class);
    }
}
