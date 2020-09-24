<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $fillable = [
        'body' , 'image' , 'user_id'
    ] ;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_posts');
    }



    public function users_likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}


