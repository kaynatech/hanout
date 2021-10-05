<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Rendu extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix' ,
        'quantite',
        'total',
        'article_id',
        'user_id'
    ];

    
    protected static function booted()
    {
        static::created(function ($rendu) {
            $article = $rendu->article ;
            Inventaire::create([
                'article_id' => $rendu->article_id,
                'quantite' => $article->quantite,
                'type' => 'rendu',
                'valide' => 0,
                'user_id' => Auth::user()->id 
            ]);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
