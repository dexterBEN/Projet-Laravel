<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    //Permet d'envoyer les données au niveau de la BDD phpMyAdmin:
    protected $fillable = [
        'title',
        'description',
        'post_type',
        'date_début',
        'date_fin',
        'price',
        'maxStudent',
        'category_id',
        'status'
        
    ];

    //Relation category post: one to many
    public function category(){
        return $this->belongsToMany(Category::class);
    }

    //Relation post-picture one to one
    public function picture(){
        return $this->hasOne(Picture::class);
    }

    public function getDateDebut($value){

        return Carbon::parse($value)->format('d/m/Y');
    }

    public function scopeOrderByDate($query){
        $dateActuelle = Carbon::now();

        return $query->where('date_début', '>', $dateActuelle)->orderBy('date_début', 'ASC');
    }
}
