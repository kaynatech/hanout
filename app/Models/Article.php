<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;



    protected $appends = ['date_achat' , 'custom_id' ];
    protected $with = ['categorie'] ;
    protected $fillable = [
        "id",
        "designiation",
        "codebar",
        "quantite",
        "prix" ,
        "prix_vente1",
        "prix_vente2",
        "prix_vente3",
        "seuil1",
        "seuil2",
        "seuil3",
        "categorie_id",
        "user_id"
    ];


    // Scopes 

    public function scopePrixPositive($query){
        return $query->where('prix', '>' , 1);
    }

    // relations

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function achats()
    {
        return $this->hasMany(Achat::class);
    }

    public function vents()
    {
        return $this->hasMany(Vent::class);
    }

    public function proprietaire(){
        return $this->belongsTo(User::class , "user_id");
    }

    public function rendus(){
        return $this->hasMany(Rendu::class);
    }

    // attribute

    // public function getPrixAchatAttribute(){
    //     if($this->hasMany(Achat::class)->latest()->first()){
    //         return $this->hasMany(Achat::class)->latest()->first()->prix_achat  ;
    //     }
    //     return 1 ; 
    // } 

    public function getDateAchatAttribute(){
        if($this->achats->last()){
            return $this->achats->last()->created_at  ;
        }
        return 1 ; 
    } 

    public function  getCustomIdAttribute(){
            if($this->categorie == null){
                return 0 ;
            }
        
            $cats =  $this->Where('categorie_id' , $this->categorie_id)->orderBy('created_at','ASC')->pluck('id')->toArray();
            $partial = sprintf("%02d", array_search($this->id , $cats) + 1 ); 
            return $this->categorie->custom_id . $partial ;
        
    }
    
}
