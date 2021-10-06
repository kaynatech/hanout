<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Caise;
use App\Models\Perte;
use App\Models\Vent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function ventes(){
    return view("charts.ventes.ventes" );
    }

    public function ventesApi(){
        return Vent::select( DB::raw('DATE(created_at) x') , DB::raw('SUM(total) y') ,  DB::raw('SUM(gain) z'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE(created_at)"))
        ->get();

    }

    // achat
    public function achats(){
        return view("charts.achats.achats" );
        }
    public function achatsApi(){
        return Achat::select( DB::raw('DATE(created_at) x') , DB::raw('SUM(total) y'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE(created_at)"))
        ->get();
    }

    public function pertes(){
        return view("charts.pertes" );
        }
    
    public function pertesApi(){
        return Perte::select( DB::raw('DATE(created_at) x') , DB::raw('SUM(quantite) y'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE(created_at)"))
        ->get();
    }

    public function caise($id){
        return view("charts.caise" , ['id' => $id]);
        }
    
    public function caiseApi($id){
        return Caise::select( DB::raw('DATE(created_at) x') , DB::raw('MIN(valeur_articles + valeur ) y'))
        ->orderBy('created_at')
        ->where('user_id' , $id)
        ->groupBy(DB::raw("DATE(created_at)"))
        ->get();
    }

}
