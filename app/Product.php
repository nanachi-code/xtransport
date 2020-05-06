<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'description', 'thumbnail', 'status', 'gallery', 'category_product_id', 'company_id'];

    protected $casts = [
        'gallery' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // public function getGalleryAttribute()
    // {
    //     return explode(',', $this->gallery);
    // }
}
