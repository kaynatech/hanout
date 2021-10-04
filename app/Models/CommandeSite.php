<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandeSite extends Model
{
    use HasFactory;
    protected $fillable = [
        "total" , 
        "etat" ,
        'user_id'
    ] ;

    public function items(){
        return $this->hasMany(CommandeSiteItem::class);
    }

    public function client(){
        return $this->belongsTo(User::class);
    }
}
