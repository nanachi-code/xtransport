<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['user_id', 'content', 'excerpt', 'title', 'thumbnail', 'category_post_id', 'status', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(CategoryPost::class, "category_post_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasComments()
    {
        return count($this->comments) > 0 ? true : false;
    }
}
