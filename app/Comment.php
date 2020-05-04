<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['post_id', 'user_id', 'content', 'parent_id', 'updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getParentAttribute()
    {
        return $this::where('id', $this->parent_id)->first();
    }

    public function getChildrenAttribute()
    {
        return $this::where('parent_id', $this->id)->get();
    }

    public function hasParents()
    {
        return $this::where('id', $this->parent_id)->first() ? true : false;
    }

    public function hasChildren()
    {
        return count($this::where('parent_id', $this->id)->get()) > 0 ? true : false;
    }
}
