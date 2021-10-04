<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\FactureAchat;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Caise;


class FactureAchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $factures = FactureAchat::where('valide' , 0)->with(['fournisseur' , 'achats'])->get();
        return view('facture_achat.index' , [
            'factures' => $factures 
        ]);
    }


    public function delete($id){
        $facture = FactureAchat::find( $id);
        $facture->delete();
        FactureAchat::destroy($id);
        return ($id);

        return redirect(route('history_facture_achat'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::select('id', 'nom')->get();
        return view('facture_achat.create', [
            "fournisseurs" => $fournisseurs
        ]);
    }


    public function fetchArticleWithFournisseurId(Request $request)
    {
        $achat = Achat::Where('fournisseur_article_id', $request->id)->where('fournisseur_id', $request->fournisseur_id)->firstOrFail();
        return $achat->article;
    }

    public function new_facture(Request $request)
    {
        $fournisseurs_id = $request->fournisseur_id;
        $facture_achat =  FactureAchat::create(
            [
                "user_id" => $request->user()->id,
                "fournisseur_id" => $fournisseurs_id,
                "total" => 0,
            ]
        );
        return $facture_achat->id;
    }

    public function edit_facture($id)
    {
        $achats = Achat::Where('facture_achat_id', $id)->with(['article'])->get();
        $fournisseur_id = FactureAchat::find($id)->fournisseur_id;
        $facture = FactureAchat::select('valide')->where('id' , $id)->first();

        return view('facture_achat.edit', [
            'facture' => $facture ,
            'achats' => $achats,
            'id' => $id,
            'fournisseur_id' => $fournisseur_id
        ]);
    }

    public function add_achat(Request $request, $id)
    {
        $achat = Achat::create([
            'article_id' => $request->article_id,
            'quantite' => $request->quantite,
            'fournisseur_id' => $request->fournisseur_id,
            'facture_achat_id' => $request->facture_achat_id,
            'prix_achat' => $request->prix_achat,
            'total' => $request->prix_achat  * $request->quantite,
        ]);
        return $achat;
    }

    public function validateAchat(Request $request, $id)
    {
        $facture = FactureAchat::where('id', $id)
        ->with(['achats', 'achats.article'])
        ->get();
        $achats = Achat::Where('facture_achat_id', $id)->get();
        
        foreach ($achats as $achat) {
            $article = $achat->article;
            $article->update([
                "quantite" => $article->quantite + $achat->quantite,
                "prix" => $achat->prix_achat
            ]);

            $old_caise = $article->proprietaire->caisse;

            $caise = Caise::create([
                "user_id" => $article->proprietaire->id,
                "changer_id" => $request->user()->id,
                "changement" => - ($achat->total),
                "valeur" => $old_caise->valeur 
                - $achat->total,'type' => "achat",
            ]);
            $achatModel = Achat::find($achat->id)->update([
                'valide' => 1
            ]);
            // ->valide = 1 ;
            // $achat->save();
        }
        FactureAchat::find($id)->update([
            'total' => $achats->sum('total'),
             'valide' => 1
        ]);
        // $facture->total = $achats->sum('total') ;
        // $facture->valide = 1 ;
        // $facture->save();
    }
}
