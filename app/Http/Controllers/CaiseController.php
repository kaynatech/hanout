<?php

namespace App\Http\Controllers;

use App\Models\Caise;
use App\Models\User;


use Illuminate\Http\Request;

class CaiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tottal_article = [] ;
        $owners = User::where('role_id' , 4)->with(['articles' , 'caisses' ,'caisses.changeur'])->get() ;
        $tottal = 0 ;
        foreach($owners as $owner){
            $ar = [
                "id" => $owner->id ,
                "user" => $owner->name , 
                "tottal_article" =>$owner->articles->sum(function ($article){
                    return $article->quantite * $article->prix ;
                }),
                "nombre_article" => $owner->articles->count() ,
                "caisse" =>  $owner->caisse ,
                "historique" => $owner->caisses->reverse()
            ];
            array_push($tottal_article , $ar );
            $tottal = $tottal + $ar["tottal_article"] + $owner->caisse->valeur ;
        }

        return view('caisse.index' , ["caisses" => $tottal_article , 'tottal' => $tottal ]);
    
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $old_caise = User::find($request->user_id)->caisse ;
        // dd($old_caise);
        $caisse =  Caise::create([
            "user_id" => $request->user_id ,
            "changer_id" => $request->user()->id , 
            'type' => $request->type,
            "changement" => $request->changement,
            "valeur" => $old_caise-> valeur + $request->changement ,
        ]);
    }


}
