<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = ['name', 'phone', 'email', 'address', 'logo', 'status', 'introduction'];

    protected function products()
    {
        return $this->hasMany(Product::class);
    }
}
