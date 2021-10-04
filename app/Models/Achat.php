<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class) ;
    }
}

