<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Caise;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    public function store(Request $request){

        $achat = Achat::create([
            "fournisseur_id" => $request->fournisseur_id ,
            "article_id" => $request->article_id ,
            "quantite" => $request->quantite,
            "prix_achat" => $request->prix_achat ,
            "total" => $request->quantite * $request->prix_achat ,
        ]);
        $article = $achat->article ;
        $article->update([
            "quantite" => $article->quantite + $achat->quantite ,
            "prix" => $achat->prix_achat
        ]);

        $old_caise = $article->proprietaire->caisse ;

        $caise = Caise::create([
            "user_id" => $article->proprietaire->id ,
            "changer_id" => $request->user()->id , 
            "changement" => -($achat->total) ,
            "valeur" => $old_caise->valeur - $achat->total  ,
            'type' => "achat",
        ]);
        
    }

    public function delete($id){
        $i = Achat::find($id)->facture_achat_id ;
        Achat::destroy($id);
        return redirect(route('edit_facture_achat' , ['id' => $i]));
    }
}
