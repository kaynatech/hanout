<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Rendu;
use App\Models\Vent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function vente(Request $request)
    {
        if (!$request->start || !$request->end) {
            $today_start = Carbon::now()->format('Y-m-d 00:00:00');
            $today_end = Carbon::now()->format('Y-m-d 23:59:59');

            $vents = Vent::whereBetween('created_at', [$today_start, $today_end])
                ->orderBy('id', 'ASC')->get();
            return view('history.vente.fetch', ["ventes" => $vents]);
        }

        $start_date = Carbon::parse($request->start)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end)
            ->toDateTimeString();
        $vents = Vent::whereBetween('created_at', [$start_date, $end_date])
            ->orderBy('id', 'ASC')->get();
        return view('history.vente.fetch', ["ventes" => $vents]);

    }

    public function rendu(Request $request)
    {
        if (!$request->start || !$request->end) {
            $today_start = Carbon::now()->format('Y-m-d 00:00:00');
            $today_end = Carbon::now()->format('Y-m-d 23:59:59');

            $rendus = Rendu::whereBetween('created_at', [$today_start, $today_end])
                ->orderBy('id', 'ASC')->get();
            return view('history.rendu1.fetch', ["rendus" => $rendus]);
        }

        $start_date = Carbon::parse($request->start)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end)
            ->toDateTimeString();
        $rendus = Rendu::whereBetween('created_at', [$start_date, $end_date])
            ->orderBy('id', 'ASC')->get();
        return view('history.rendu1.fetch', ["rendus" => $rendus]);

    }

    public function achats(Request $request)
    {
        if (!$request->start || !$request->end) {
            $today_start = Carbon::now()->format('Y-m-d 00:00:00');
            $today_end = Carbon::now()->format('Y-m-d 23:59:59');

            $achats = Achat::whereBetween('created_at', [$today_start, $today_end])
                ->where('valide' , 1)
                ->orderBy('id', 'ASC')->get();
            return view('history.achat.fetch', ["achats" => $achats]);
        }

        $start_date = Carbon::parse($request->start)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end)
            ->toDateTimeString();
        $achats = Achat::whereBetween('created_at', [$start_date, $end_date])
            ->where('valide' , 1)
            ->orderBy('id', 'ASC')->get();
            return view('history.achat.fetch', ["achats" => $achats]);
    }
}
