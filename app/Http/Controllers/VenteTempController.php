<?php

namespace App\Http\Controllers;

use App\Models\VenteTemp;
use App\Services\VenteTempService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenteTempController extends Controller
{   
    public function index(){
        $vente_temps = VenteTemp::with('article')->get();
        $sum =  DB::table('vente_temps')->max('total');

        return view('vente_temp.index' , ["ventes_temp" => $vente_temps , "sum" => $sum]);
    }

    public function store(Request $request ){
        $vente_temp = (new VenteTempService())->add_vente_temp($request);
        return $vente_temp ;
    }

    public function badge(){
        $c = DB::select("SELECT count(id) as count FROM vente_temps")[0];
        return($c);
    }
}
