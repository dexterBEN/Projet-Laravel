<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'link', 'title'
    ];

    //relation picture-post, post has one picture
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
