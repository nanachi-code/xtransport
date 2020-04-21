<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'description', 'thumbnail', 'status', 'category_product_id', 'company_id'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
