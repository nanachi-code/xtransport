<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable = ['name', 'date', 'address', 'thumbnail','status','post_id'];
}
