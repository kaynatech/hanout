<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Categorie extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $appends = ['custom_id'];

    protected $fillable = [
        "nom" ,
        "level" ,
        "categorie_id"
    ];



    public function children(){
        return $this->hasMany($this , 'categorie_id');
    }

    public function parent(){
        return $this->belongsTo($this , 'categorie_id');
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function scopeLevel($query , $level){
        if($level != 0 ){
            return $query->where('level' , $level);
        }
    }

    public function  getCustomIdAttribute(){
        if($this->level == 1){
            $cats =  $this->Where('level' , 1)->orderBy('updated_at','ASC')->pluck('id')->toArray();
            return array_search($this->id , $cats) + 1;
        }
        else{
            $cats =  $this->Where('categorie_id' , $this->categorie_id)->orderBy('updated_at','ASC')->pluck('id')->toArray();
            $partial = sprintf("%01d", array_search($this->id , $cats) + 1 ); 
            return $this->parent->custom_id . $partial ;
        }
    }
}
