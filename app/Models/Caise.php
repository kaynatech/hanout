<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caise extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id" ,
        "changer_id" , 
        "valeur" ,
        'type',
        "changement",
        'valeur_articles'
    ];

    // relation
    public function proprietaire(){
        return $this->belongsTo(User::class , "user_id");
    }

    public function changeur(){
        return $this->belongsTo(User::class , "changer_id");
    }
    // attribute

}
