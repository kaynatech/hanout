<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use RahulHaque\Filepond\Facades\Filepond;



class ArticleController extends Controller
{
    public function index()
    {
        $fournisseurs = Cache::remember('fournisseur', 60, function () {
            return Fournisseur::all();
        });
        return view(
            "article.index",
            [
                "fournisseurs" => $fournisseurs
            ]
        );
    }

    public function fetch(Request $request)
    {
        $des1 = $request->designiation1;
        $des2 = $request->designiation2;
        $des3 = $request->designiation3;
        $code = $request->code;
        if ($code) {
            $articles = Article::select('id', 'designiation', 'prix', 'quantite', 'prix_vente1', 'prix_vente2', 'prix_vente3', 'user_id')->with([
                'categorie' => function ($q) {
                    $q->select('nom', 'id');
                },
                'achats' => function ($q) {
                    $q->orderBy('created_at', 'desc')->first();
                },
                'proprietaire'
            ])
            ->Where(
                'id' , $code 
            )->limit(1)->get();
        } else {
            $articles = Article::select('id', 'designiation', 'prix', 'quantite', 'prix_vente1', 'prix_vente2', 'prix_vente3', 'user_id')->with([
                    'categorie' => function ($q) {
                        $q->select('nom', 'id');
                    },
                    'achats' => function ($q) {
                        $q->orderBy('created_at', 'desc')->first();
                    },
                    'proprietaire'
                ])
                ->Where(
                    [
                        ["designiation", "like", "%$des1%"],
                        ["designiation", "like", "%$des2%"],
                        ["designiation", "like", "%$des3%"],
                        ["quantite", ">", "0"],
                    ]
                )->limit(30)->get();
        }
        // dd($articles->toArray());
        return view("article.fetch", ["articles" => $articles]);
    }

    public function create()
    {
        $users = User::where("role_id", 4)->get();
        $categories = Categorie::all();
        $level_one_categorie = Categorie::Where("level", 1)->get();
        return view("article.create", [
            "categories" => $categories,
            "level_one_categorie" => $level_one_categorie,
            "users" => $users
        ]);
    }

    public function store(Request $request)
    {
        $article = Article::create([
            "id" => $request->id,
            "designiation" => $request->nom,
            "codebar" => $request->codebar,
            "quantite" => $request->quantite,
            "prix_vente1" => $request->marge1,
            "prix_vente2" => $request->marge2,
            "prix_vente3" => $request->marge3,
            "seuil1" => $request->seuil1,
            "seuil2" => $request->seuil2,
            "seuil3" => $request->seuil3,
            "categorie_id" => $request->categorie_id,
            "user_id" => $request->user_id
        ]);

        if ($request->avatar) {
            Filepond::field($request->avatar)->validate(['avatar' => 'image|max:2000']);
            $fileInfo = Filepond::field($request->avatar)->getFile();


            $article->addMedia($fileInfo->path())
                ->toMediaCollection();
        }
        return $article;
    }

    public function edit(Request $request, $id)
    {
        $article = Article::find($id);
        $categories = Categorie::all();
        $images = $article->getMedia();
        $users = User::where("role_id", 4)->get();
        // dd($images);

        if (sizeof($images) > 0) {
            // return ($images[sizeof($images) - 1]);
            $imageUrl = $images[sizeof($images) - 1]->getUrl();
        } else {
            $imageUrl = "https://i.imgur.com/fcYbZy3.jpeg";
        }
        if ($article) {
            return view(
                "article.edit",
                [
                    "article" => $article,
                    "categories" => $categories,
                    "imageUrl" => $imageUrl,
                    "users" => $users
                ]
            );
        }
    }

    public function put(Request $request, $id)
    {
        $article = Article::find($id);

        $article->update([
            "id" => $request->id,
            "designiation" => $request->nom,
            "codebar" => $request->codebar,
            "quantite" => $request->quantite,
            "prix_vente1" => $request->marge1,
            "prix_vente2" => $request->marge2,
            "prix_vente3" => $request->marge3,
            "seuil1" => $request->seuil1,
            "seuil2" => $request->seuil2,
            "seuil3" => $request->seuil3,
            "categorie_id" => $request->categorie_id,
            "user_id" => $request->user_id
        ]);

        if ($request->avatar) {
            Filepond::field($request->avatar)->validate(['avatar' => 'image|max:2000']);
            $fileInfo = Filepond::field($request->avatar)->getFile();



            $article->addMedia($fileInfo->path())
                ->toMediaCollection();
        }
        return redirect("/article/$id");
    }

    public function fetchWithId(Request $request)
    {
        $article = Article::findOrFail($request->id);
        return $article;
    }
}
