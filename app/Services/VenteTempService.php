<?php
namespace App\Services ;

use App\Models\VenteTemp;
use Illuminate\Http\Request;

class VenteTempService {
    public function add_vente_temp(Request $request){
        $vent_temp = VenteTemp::create([
            "quantite" => $request->quantite ,
            "prix" => $request->prix, 
            "total" => $request->total ,
            "article_id" => $request->article_id
        ]);

        return $vent_temp ;
    }
}
