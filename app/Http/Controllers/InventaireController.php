<?php

namespace App\Http\Controllers;

use App\Models\Inventaire ;

use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function index($type = null ){
        if($type == 'all'){
            $inventaires = Inventaire::where('valide' , 0)->with(['article' , 'article.categorie' , 'user'])->get();
        }
        else{
            $inventaires = Inventaire::where(['type' => $type , 'valide' => 0 ])->with(['article' , 'article.categorie'])->get();
        }

        return view('inventaire.index' , [
            'inventaires' => $inventaires
        ]);
    }

    public function delete($id){
        Inventaire::where('id' , $id)->update(['valide' => 1]);
    }
}


