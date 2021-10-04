<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureVente extends Model
{
    use HasFactory;

    protected $fillable = [
        'gain',
        'total',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vents(){
        return $this->hasMany(Vent::class);
    }

}
