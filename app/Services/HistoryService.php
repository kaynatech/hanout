<?php
namespace App\Services ;

use App\Models\Vent;
use App\Models\Rendu;
use App\Models\Achat;
use App\Models\Perte;
use App\Models\Trouver;
use Illuminate\Http\Request;
use Carbon\Carbon;


class HistoryService
{
    public function getHistory($model, Request $request)
    {
        if (!$request->start || !$request->end) {
            $start_date = Carbon::now()->format('Y-m-d 00:00:00');
            $end_date = Carbon::now()->format('Y-m-d 23:59:59');
        } else {

            $start_date = Carbon::parse($request->start)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->end)
                ->toDateTimeString();
        }
        
        
        switch($model):
            case('vent'):
                $vents = Vent::whereBetween('created_at', [$start_date, $end_date])
                ->orderBy('id', 'ASC')->get();
                return view('history.vente.fetch', ["ventes" => $vents]);
            
            case('rendu'):
                $rendus = Rendu::whereBetween('created_at', [$start_date, $end_date])
                    ->orderBy('id', 'ASC')->get();
                return view('history.rendu1.fetch', ["rendus" => $rendus]);

            case('achat'):
                $achats = Achat::whereBetween('created_at', [$start_date, $end_date])
                ->where('valide' , 1)
                ->orderBy('id', 'ASC')->get();
                return view('history.achat.fetch', ["achats" => $achats]);

            case('perte'):
                $pertes = Perte::whereBetween('created_at', [$start_date, $end_date])
                ->where('etat' , 1)
                ->orderBy('id', 'ASC')->get();
                return view('history.perte.fetch', ["pertes" => $pertes]);

            case('trouver'):
                $trouvers = Trouver::whereBetween('created_at', [$start_date, $end_date])
                ->where('etat' , 1)
                ->orderBy('id', 'ASC')->get();
                return view('history.trouver.fetch', ["trouvers" => $trouvers]);

            endswitch;
    }
}
