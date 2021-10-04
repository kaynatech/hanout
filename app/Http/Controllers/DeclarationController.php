<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Caise;
use App\Models\Endomager;
use App\Models\Perte;
use App\Models\Rendu;
use App\Models\Trouver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeclarationController extends Controller
{
    public function post_perte(Request $request){
        $perte = Perte::create([
            "user_id" => Auth::user()->id ,
            "article_id" => $request->article_id ,
            "quantite" => $request->quantite ,
            "etat" => 0
        ]);
        return $perte ;
    }

    public function post_trouver(Request $request){
        $perte = Trouver::create([
            "user_id" => Auth::user()->id ,
            "article_id" => $request->article_id ,
            "quantite" => $request->quantite ,
            "etat" => 0
        ]);
        return $perte ;
    }

    public function post_endomager(Request $request){
        $perte = Endomager::create([
            "user_id" => Auth::user()->id ,
            "article_id" => $request->article_id ,
            "quantite" => $request->quantite ,
            "etat" => 0
        ]);
        return $perte ;
    }

    public function post_rendu(Request $request){
        $rendu = Rendu::create([
            "user_id" => Auth::user()->id ,
            "article_id" => $request->article_id ,
            "quantite" => $request->quantite,
            "prix" => $request->prix,
            "total" => $request->prix * $request->quantite 
        ]);
        $article = $rendu->article ;
        $article->update([
            "quantite" => $article->quantite + $rendu->quantite
        ]);
        $old_caise = $article->proprietaire->caisse ;
        Caise::create([
            "type" => "rendu" ,
            "user_id" => $old_caise->user_id,
            "changer_id" => $request->user()->id,
            'changement' => - $rendu->total ,
            'valeur' => $old_caise->valeur -  $rendu->total
        ]);
    }

    public function index_perte(){
        $perte = Perte::where('etat' , 0)->get();
        $type = "perte" ;
        
        return view('declaration.index' , ["declarations" => $perte , "type" => $type]);
    }

    
    public function index_trouver(){
        $perte = Trouver::where('etat' , 0)->get();
        $type = "trouver" ;
        
        return view('declaration.index' , ["declarations" => $perte , "type" => $type]);
    }

    public function index_endomager(){
        $perte = Endomager::where('etat' , 0)->get();
        $type = "trouver" ;
        
        return view('declaration.index' , ["declarations" => $perte , "type" => $type]);
    }


    public function validate_perte($id){
        $perte = Perte::find($id)->first();
        if($perte->etat == 0 ){
            $article = $perte->article ;
            $article->update([
                "quantite" => $article->quantite - $perte->quantite,
            ]);
            $perte->update([
                "etat" => 1 
            ]);
        }
    }

    public function validate_trouver($id){
        $trouver = Trouver::find($id)->first();
        if($trouver->etat == 0 ){
            $article = $trouver->article ;
            $article->update([
                "quantite" => $article->quantite + $trouver->quantite,
            ]);
            $trouver->update([
                "etat" => 1 
            ]);
        }
    }

    public function validate_endomager($id){
        $endomager = Endomager::find($id)->first();
        if($endomager->etat == 0 ){
            $article = $endomager->article ;
            $article->update([
                "quantite" => $article->quantite + $endomager->quantite,
            ]);
            $endomager->update([
                "etat" => 1 
            ]);
        }
    }
}
