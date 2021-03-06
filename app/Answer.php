<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body', 'votes', 'best'];

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function forum()
    {
        return $this->belongsTo("App\Forum");
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'likable');
    }

}
