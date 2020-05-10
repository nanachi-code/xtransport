<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use Rateable;

    protected $table = 'document';
    const PENDING = 0;
    const PUBLISH = 1;
    const DELETED = -1;
    protected $fillable = ['title', 'summary','author', 'file','user_id' , 'download_number', 'bookmark_number'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'documents_users', 'document_id', 'users_id');
    }
}
