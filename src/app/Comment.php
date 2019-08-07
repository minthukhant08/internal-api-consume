<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'activity_id', 'descriptions'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function activity()
    {
      return $this->belongsTo(Activity::class);
    }
}
