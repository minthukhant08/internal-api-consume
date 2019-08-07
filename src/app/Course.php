<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table='course';

    protected $fillable = [
        'name', 'image'
    ];

    protected $hidden = [
       'image'
    ];

    public function details()
    {
      return $this->hasMany(CourseDetail::class);
    }

    public function batches()
    {
      return $this->belongsToMany(Batch::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
