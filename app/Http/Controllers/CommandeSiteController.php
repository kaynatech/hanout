<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommandeSite ;
use App\Models\CommandeSiteItem;
use App\Models\VenteTemp;


class CommandeSiteController extends Controller
{
    public function index(){
        $commandes = CommandeSite::with(['client'])->get();
        return view("commande_site.index" , ["commandes" => $commandes ]);
    }

    public function edit($id){
        $commande = CommandeSite::find($id)->with(['client' , 'items'])->first();
        $articles = [] ;
        foreach($commande->items as $item){
            array_push($articles, $item->article);
        }
        return view("commande_site.commande" , ["commande" => $commande ,"articles" => $articles  ]);

    }

    public function edit_item( Request $request , $id){
        $prix = $request->prix ;
        $quantite = $request->quantity ;
        $total = $prix * $quantite ;
        $commande_item = CommandeSiteItem::find($id);
        $commande_item->update([
            "prix" => $prix ,
            "quantity" => $quantite ,
            "total" => $total 
        ]);
    }

    public function delete_item($id){
        CommandeSiteItem::destroy($id);
    }

    public function valider_commande($id){
        $commande = CommandeSite::find($id)->with(["items"])->first();
        $commande->update([
            "total" => $commande->items->sum("total"),
            "etat" => 1 
        ]);
        foreach($commande->items as $item){
            $vent_temp = VenteTemp::create([
                "quantite" => $item->quantity ,
                "prix" => $item->prix, 
                "total" => $item->total ,
                "article_id" => $item->article_id
            ]);
        }
    }
}

