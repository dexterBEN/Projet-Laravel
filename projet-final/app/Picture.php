<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //relation picture-post has one 
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
