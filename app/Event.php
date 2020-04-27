<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = ['name', 'date', 'address', 'thumbnail','status','post_id'];

    public function Users()
    {
        return $this->belongsToMany('App\User','events_users','event_id','users_id');
    }
}
