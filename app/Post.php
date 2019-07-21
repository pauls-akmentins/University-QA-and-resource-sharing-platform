<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories()
    {
        return $this->belongTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
