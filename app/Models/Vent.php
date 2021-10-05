<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Vent extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix_vente',
        'quantite',
        'gain',
        'user_id',
        'total',
        'article_id',
        'facture_vente_id',
    ];

    protected static function booted()
    {
        static::created(function ($vente) {
            $article = $vente->article ;
            Inventaire::create([
                'article_id' => $vente->article_id,
                'quantite' => $article->quantite,
                'type' => 'vente',
                'valide' => 0,
                'user_id' => Auth::user()->id 
            ]);
        });
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function facture_vente()
    {
        return $this->belongsTo(FactureVente::class);
    }
}
