<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = "category_post";
    protected $fillable = ["name"];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->posts->each(function ($post) {
                $post->category_post_id = null;
                $post->save();
            });
        });
    }
}
