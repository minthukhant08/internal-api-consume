<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchCourse extends Model
{
    protected $table = 'batch_course';
    public $timestamps = false;
    protected $fillable = [
        'batch_id', 'course_id'
    ];

    public function batch()
    {
      return $this->belongsTo(Batch::class);
    }

    public function course()
    {
      return $this->belongsTo(Course::class);
    }
}
