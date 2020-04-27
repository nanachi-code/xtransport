<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = ['name', 'date', 'address', 'thumbnail', 'status', 'introduction'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'events_users', 'event_id', 'users_id');
    }
}
