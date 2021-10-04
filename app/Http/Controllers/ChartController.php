<?php

namespace App\Http\Controllers;

use App\Models\Achat;
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
        return Vent::select( DB::raw('DATE(created_at) x') , DB::raw('SUM(prix_vente) y'))
        ->orderBy('created_at')
        ->groupBy(DB::raw("DATE(created_at)"))
        ->get();

    }

    // achat
    public function achats(){
        return view("charts.achats.achats" );
        }
    
        public function achatsApi(){
            return Achat::select( DB::raw('DATE(created_at) x') , DB::raw('SUM(prix_achat) y'))
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
}
