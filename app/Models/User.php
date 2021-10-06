<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "role_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation 
    public function commandes_site(){
        return $this->hasMany(CommandeSite::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function caisses(){
        return $this->hasMany(Caise::class , "user_id");
    }

    public function changementCaise(){
        return $this->hasMany(User::class , "changeur_id");
    }

    public function rendu(){
        return $this->hasMany(Rendu::class);
    }


    // attribute
    // caise
    public function getCaisseAttribute(){
        if($this->hasMany(Caise::class , "user_id")){
            return $this->hasMany(Caise::class , "user_id")->orderBy('created_at', 'desc')->first() ;
        }
        else{
            return null ;
        }
    }

    // scope
    public function scopeAssossier($query){
        return $query->where('role_id' , 4);
    }

}