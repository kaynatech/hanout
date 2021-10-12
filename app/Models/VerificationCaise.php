<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCaise extends Model
{
    use HasFactory;
    protected $fillable = [
        'a5',
        'a10',
        'a20',
        'a50',
        'a100',
        'a200',
        'a500',
        'a1000',
        'a2000',
        'total',
        'decalage',
        'caise_reel',
        'user_id',
        'changer_id',
        'ventes'
    ];

    public function changer(){
        return $this->belongsTo(User::class , 'changer_id');
    }

    public function owner(){
        return $this->belongsTo(User::class , 'user_id');
    }
    
    public function caise(){
        return $this->belongsTo(Caise::class);
    }
}
