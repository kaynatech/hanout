<?php

namespace App\Http\Controllers;

use App\Services\VenteService;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class VentController extends Controller
{
    public function store(Request $request , VenteService $service){
        $facture_vent = $service->store($request);
        
        return View("article.facture_vente" , [
            "facture_vente" => $facture_vent ,
            "vents" => $facture_vent->vents
        ]);
    }
}
