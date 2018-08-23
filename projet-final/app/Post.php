<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Permet d'envoyer les données au niveau de la BDD phpMyAdmin:
    /*protected $fillable = [
        'title',
        'description',
        'post_type',
        'date_début',
        'date_fin',
        'price',
        'maxStudent'
    ];*/

    //Relation category post: one to many
    public function category(){
        return $this->belongsToMany(Category::class);
    }

    //Relation post-picture one to one
    public function picture(){
        return $this->hasOne(Picture::class);
    }
}
