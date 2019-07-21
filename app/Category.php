<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    //might not need to be added
    protected $table = 'categories';

    public function questions()
    {
        return $this->hasMany('App\Post');
    }
}
