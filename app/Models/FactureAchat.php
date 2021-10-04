<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureAchat extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "fournisseur_id",
        "total",
        'valide'
    ];

    public function achats()
    {
        return $this->hasMany(Achat::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }


    // public function delete()
    // {
    //     \DB::beginTransaction();

    //     Achat::where('facture_achat_id' , $this->id)->delete();
    //     \DB::commit();

    // }
}
