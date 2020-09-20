<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('post_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_post');
    }
    public function users_likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
