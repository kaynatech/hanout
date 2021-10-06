<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'quantite',
        'type',
        'valide',
        'user_id'
    ];

    // scopes 
    public function scopeArticleOf($query , $article_id){
        return $query->where('article_id' , $article_id);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
