<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categorie;
use RahulHaque\Filepond\Facades\Filepond;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::WithCount('articles')->get();

        return View("categorie.index" , [
            "categories" => $categories 
        ]);
    }

    public function fetch(Request $request){
        $nom = $request->nom ;
        $level = $request->level ;

        $categories = Categorie::Where([
            ["nom" , "like" , "%$nom%"],
            ]
            )->level($level)->get();

        return view("categorie.fetch" , ["categories" => $categories]);
    }   

    public function create(){
        $categories = Categorie::all();
        $level_one_categorie = Categorie::Where("level" , 1)->get();
        return View("categorie.create" , [
            "categories" => $categories ,
            "level_one_categorie" => $level_one_categorie
        ]);
    }

    public function store(Request $request){


        $categorie_id = $request->categorie_id ? $request->categorie_id : null ; 
        $categorie = Categorie::create([
            "nom" => $request->nom ,
            "categorie_id" => $categorie_id ,
            "level" => $request->level
        ]); 
        if($request->avatar){
            Filepond::field($request->avatar)->validate(['avatar' => 'image|max:2000']);
            $fileInfo = Filepond::field($request->avatar)->getFile();
            
    
            $categorie->addMedia($fileInfo->path())
            ->toMediaCollection();
        }   

        return ;
    }

    public function edit(Request $request , $id){
        $categories = Categorie::all();
        $level_one_categorie = Categorie::Where("level" , 1)->get();
        $categorie = Categorie::find($id);

        $images = $categorie->getMedia();

        if(sizeof($images) > 0 ){
            $imageUrl = $images[sizeof($images) - 1]->getFullUrl();
        }else{
            $imageUrl = "https://i.imgur.com/fcYbZy3.jpeg" ;
        }

        return view("categorie.edit" , [
            "categories" => $categories ,
            "level_one_categorie" => $level_one_categorie ,
            "categorie" => $categorie,
            "imageUrl" => $imageUrl
        ]);

    }


    public function put(Request $request , $id){


        $categorie_id = $request->categorie_id ? $request->categorie_id : null ; 
        $categorie = Categorie::find($id);
        $categorie->update([
            "nom" => $request->nom ,
            "categorie_id" => $categorie_id ,
            "level" => $request->level
        ]); 
        if($request->avatar){
            Filepond::field($request->avatar)->validate(['avatar' => 'image|max:2000']);
            $fileInfo = Filepond::field($request->avatar)->getFile();
            
    
            $categorie->addMedia($fileInfo->path())
            ->toMediaCollection();
        }   

        return redirect("/categorie/$id");
    }

    public function delete(Request $request , $id){
        Categorie::destroy($id);
    }
}
