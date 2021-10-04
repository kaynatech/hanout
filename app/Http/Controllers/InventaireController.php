<?php

namespace App\Http\Controllers;

use App\Models\Inventaire ;

use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function index(){
        $inventaires = Inventaire::with(['article' , 'article.categorie'])->get();
        return view('inventaire.index' , [
            'inventaires' => $inventaires 
        ]);
    }

    public function delete($id){
        Inventaire::destroy($id);
        return redirect(route('inventaire'));
    }
}


