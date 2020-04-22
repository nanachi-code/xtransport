<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactFeedback extends Model
{
    protected $table = "contact_feedback";
    protected $fillable = ["name","email","website_url","comment"];
}
