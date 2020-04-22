<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'description', 'thumbnail', 'status', 'category_product_id', 'company_id'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
