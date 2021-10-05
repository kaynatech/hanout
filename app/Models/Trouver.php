<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Trouver extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id" , 
        "article_id" ,
        "etat",
        'quantite'
    ];

    protected static function booted()
    {
        static::created(function ($trouver) {
            $article = $trouver->article ;
            Inventaire::create([
                'article_id' => $trouver->article_id,
                'quantite' => $article->quantite,
                'type' => 'trouver',
                'valide' => 0,
                'user_id' => Auth::user()->id 
            ]);
        });
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
