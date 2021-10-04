<?php 
namespace App\Services ;

use App\Models\Article;
use App\Models\Caise;
use App\Models\FactureVente;
use App\Models\Vent;
use App\Models\VenteTemp;
use Illuminate\Http\Request;

class VenteService {
    public function store(Request $request){
        $ventes_temp = VenteTemp::with("article")->get();
        $facture_vent = FactureVente::create([
            "total" => 0 ,
            "gain" => 0 ,
            "user_id" => $request->user()->id 
        ]);
        $gain = 0 ;
        $total = 0 ;

        foreach($ventes_temp as $vente_temp){
            $article = $vente_temp->article ;
            $article->save ;
            $article->quantite = $article->quantite - $vente_temp->quantite ;
            $article->save();
            $vent = Vent::create([
                "prix_vente" => $vente_temp->prix ,
                "quantite" => $vente_temp->quantite,
                "total" => $vente_temp->total ,
                "gain" => $vente_temp->total - ($article->prix * $vente_temp->quantite) ,
                "user_id" => $request->user()->id,
                "article_id" => $article->id,
                "facture_vente_id" => $facture_vent->id 
            ]);
            $gain += $vent->gain ;
            $total += $vent->total ;
            $old_caise = $article->proprietaire->caisse ;
            Caise::create([
                "type" => "vente" ,
                "user_id" => $old_caise->user_id,
                "changer_id" => $request->user()->id,
                'changement' => $vente_temp->total ,
                'valeur' => $old_caise->valeur +  $vente_temp->total
            ]);
            $vente_temp->delete();
        }

        $facture_vent->gain = $gain ;
        $facture_vent->total = $total ;
        $facture_vent->save(); 
        return $facture_vent ;

    }
}