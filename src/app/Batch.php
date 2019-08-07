<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use SoftDeletes;
    protected $table = 'batch';
    protected $fillable = [
        'name', 'start_date', 'end_date'
    ];

    public function courses()
    {
      return $this->belongsToMany(Course::class);
    }

    public function users()
    {
      return $this->hasMany(User::class);
    }
}
