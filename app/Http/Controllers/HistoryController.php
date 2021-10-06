<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Rendu;
use App\Models\Vent;
use Carbon\Carbon;
use App\Services\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function vente(Request $request , HistoryService $service)
    {
        return $service->getHistory('vent' , $request);
    }

    public function rendu(Request $request ,HistoryService $service)
    {
        return $service->getHistory('rendu' , $request);
    }

    public function achats(Request $request , HistoryService $service)
    {
        return $service->getHistory('achat' , $request); 
    }

    public function pertes(Request $request , HistoryService $service)
    {
        return $service->getHistory('perte' , $request); 
    }

    public function trouver(Request $request , HistoryService $service)
    {
        return $service->getHistory('trouver' , $request);    
    }
}
