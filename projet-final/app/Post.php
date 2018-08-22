<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Relation category post: one to many
    public function category(){
        return $this->belongsToMany(Category::class);
    }

    //Relation post-picture one to one
    public function picture(){
        return $this->hasOne(Picture::class);
    }
}
