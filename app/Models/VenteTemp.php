<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenteTemp extends Model
{
    use HasFactory;

    protected $with = ["article"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantite',
        'prix',
        'total',
        'article_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
