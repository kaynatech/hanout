<?php

namespace App\Http\Controllers;

use App\Models\Inventaire ;

use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function index($type = null ){
        if($type == 'vente'){
            $inventaires = Inventaire::where(['type' , $type ])->with(['article' , 'article.categorie'])->get();
        }
        else{
            $inventaires = Inventaire::with(['article' , 'article.categorie' , 'user'])->get();
        }

        return view('inventaire.index' , [
            'inventaires' => $inventaires 
        ]);
    }

    public function delete($id){
        Inventaire::destroy($id);
        return redirect(route('inventaire'));
    }
}


