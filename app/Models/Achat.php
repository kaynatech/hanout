<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        "fournisseur_id" , 
        "article_id" ,
        'fournisseur_article_id',
        'facture_achat_id',
        "quantite" ,
        "prix_achat" ,
        "total" ,
        'valide',
        "user_id",
    ];

    protected static function booted()
    {
        static::created(function ($achat) {
            $article = $achat->article ;
            Inventaire::create([
                'article_id' => $achat->article_id,
                'quantite' => $article->quantite,
                'type' => 'achat',
                'valide' => 0,
                'user_id' => Auth::user()->id 
            ]);
        });
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class) ;
    }
}

