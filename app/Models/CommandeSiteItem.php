<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeSiteItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "prix",
        "quantity",
        'total',
        "article_id"
    ];

    public function commande(){
        return $this->belongsTo(CommandeSite::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

}
