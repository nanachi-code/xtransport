<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = "category_product";
    protected $fillable = ["name"];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->products->each(function ($product) {
                $product->category_post_id = null;
                $product->save();
            });
        });
    }
}
