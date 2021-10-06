<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CaiseController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CommandeSiteController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\FactureAchatController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\InventaireController;
use App\Http\Controllers\VentController;
use App\Http\Controllers\VenteTempController;
use App\Http\Controllers\VerificationCaiseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


// Article routes 
Route::group(["prefix" => "article" , 'middleware' => 'auth'] , function(){
    Route::get('/fetch', [ArticleController::class , 'fetch']);
    Route::post('/fetchWithId', [ArticleController::class , 'fetchWithId'])->name('fetch_with_id_article');
    Route::get('/stat/{id}' , [ArticleController::class , 'stat'])->name('article_stat');
    Route::get('/statFetch/{id}' , [ArticleController::class , 'statFetch'])->name('article_statFetch');
    Route::get('/', [ArticleController::class , 'index'])->name("articles");
    Route::get('/create', [ArticleController::class , 'create'])->name("create_article");
    Route::get('/{id}', [ArticleController::class , 'edit'])->name("edit_article");
    Route::put('/{id}', [ArticleController::class , 'put'])->name("put_article");
    Route::post('/create', [ArticleController::class , 'store']);

});


// Ventes temps
Route::group(["prefix" => 'vent-temp' , "middleware" => "auth"] ,function () {
    Route::get('/' ,  [VenteTempController::class , 'index'] )->name("vente_temp");
    Route::get('/badge' ,  [VenteTempController::class , 'badge'] );
    Route::post('/', [VenteTempController::class , 'store']);
});


// Ventes
Route::group(["prefix" => 'vent' , "middleware" => "auth"] ,function () {
    Route::get('/' ,  [VenteTempController::class , 'index'] );
    Route::post('/', [VentController::class , 'store']);
});

// achat 

Route::group(["prefix" => "achat" , "middleware" => "auth"] , function(){
    Route::post('/' , [ AchatController::class , 'store' ]);
    Route::get('/{id}/delte' , [AchatController::class , 'delete'] )->name('delete_achat');
});


// Categorie
Route::group(["prefix" => 'categorie' , "middleware" => "auth"] ,function () {
    Route::get('/' ,  [CategorieController::class , 'index'])->name("categories");
    Route::get('/fetch' ,  [CategorieController::class , 'fetch'] );
    Route::get('/create' , [CategorieController::class , 'create'])->name("create_categorie");
    Route::post('/create' , [CategorieController::class , 'store']);
    Route::get("/{id}" , [ CategorieController::class , 'edit'] )->name("edit_categorie");
    Route::put("/{id}" , [ CategorieController::class , 'put'] )->name("edit_categorie");
    Route::delete("/delete/{id}" , [ CategorieController::class , 'delete'] )->name("delete_categorie");
});


// Historique
Route::group(["prefix" => "history" , "middleware" => "auth"] , function(){

    // ventes
    Route::get("/ventes" , function(){
        return view("history.vente.index");
    })->name("ventes_history");
    Route::get("/ventes/fetch" , [HistoryController::class , 'vente']);

    // rendus
    Route::get("/rendus" , function(){
        return view("history.rendu.index");
    })->name("rendus_history");
    Route::get("/rendus/fetch" , [HistoryController::class , 'rendu']);

    // achats
    Route::get("/achats" , function(){
        //
        return view("history.achat.index");
    })->name("achats_history");
    Route::get("/achats/fetch" , [HistoryController::class , 'achats']);

    // perte
    Route::get("/pertes" , function(){
        //
        return view("history.perte.index");
    })->name("pertes_history");
    Route::get("/pertes/fetch" , [HistoryController::class , 'pertes']);
  
});

// statisitque
Route::group(["prefix" => "charts" , "midleware" => "auth"] , function(){
    // ventes 
    Route::get("/ventes" , [ChartController::class , "ventes"])->name("ventes_charts");
    Route::get("/ventes/api" , [ChartController::class , "ventesApi"]);
    // achats
    Route::get("/achats" , [ChartController::class , "achats"])->name("achats_charts");
    Route::get("/achats/api" , [ChartController::class , "achatsApi"]);
    // pertes
    Route::get("/pertes" , [ChartController::class , "pertes"])->name("pertes_charts");
    Route::get("/pertes/api" , [ChartController::class , "pertesApi"]);
    // caise
    Route::get('/caisse' , [CaiseController::class , 'index'])->name('caisse_charts');
    // caise graph
    Route::get('/caisseGraph/{id}' , [ChartController::class , 'caise'])->name('caisse_charts_graph');
    Route::get('/ApicaisseGraph/{id}' , [ChartController::class , 'caiseApi'])->name('caisse_charts_api');


});

// commande site
Route::group(["prefix" => "commande-site" , "midleware" => "auth"] , function(){
    Route::get('/' , [CommandeSiteController::class , 'index'])->name("commandes-site");
    Route::get('/{id}' , [CommandeSiteController::class , 'edit'])->name("edit-commande-site");
    Route::post('/{id}/endomager' , [CommandeSiteController::class , 'valider_commande']);
    Route::post('/commande-item/{id}' , [CommandeSiteController::class , 'edit_item']);
    Route::delete('/commande-item/{id}' , [CommandeSiteController::class , 'delete_item']);
});

// declaration 
Route::group(["prefix" => 'declaration' , "midleware" => "auth"] , function(){
    #liste des declaration 
    Route::get('/perte' ,[DeclarationController::class , 'index_perte'] )->name('declaration.perte') ;
    Route::get('/trouver' ,[DeclarationController::class , 'index_trouver'] )->name('declaration.trouver') ;
    Route::get('/endomager' ,[DeclarationController::class , 'index_endomager'] )->name('declaration.endomager') ;

    #ajouter une declaration temporele
    Route::post('/perte' ,[DeclarationController::class , 'post_perte'] ) ;
    Route::post('/trouver' ,[DeclarationController::class , 'post_trouver'] ) ;
    Route::post('/endomager' ,[DeclarationController::class , 'post_endomager'] ) ;

    #valider la declaration temporele 
    Route::post('/perte/{id}' ,[DeclarationController::class , 'validate_perte'] ) ;
    Route::post('/trouver/{id}' ,[DeclarationController::class , 'validate_trouver'] ) ;
    Route::post('/endomager/{id}' ,[DeclarationController::class , 'validate_endomager'] ) ;

    
    # declarer un rendu
    Route::post('/rendu' ,[DeclarationController::class , 'post_rendu'] ) ;
});


// caise 

Route::group(["prefix" => 'caise' ,  "middleware" => "auth"] , function(){
    Route::post('/' , [CaiseController::class , 'store']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
    
});

// facture achat 
Route::group(['prefix'=> 'facture_achat' ,  "middleware" => "auth"] , function(){
    Route::get('/' , [FactureAchatController::class , 'create'])->name('create_facture_achat');
    Route::get('/history' , [FactureAchatController::class , 'history'])->name('history_facture_achat');
    Route::post('/' , [FactureAchatController::class , 'new_facture']);
    Route::post('/cherchWithFournisseurId' , [FactureAchatController::class , 'fetchArticleWithFournisseurId'])->name('fetchArticleWithFournisseurId');
    Route::get('/{id}', [FactureAchatController::class , 'edit_facture'])->name('edit_facture_achat');
    Route::post('/{id}/validate', [FactureAchatController::class , 'validateAchat'])->name('validate_facture_achat');
    Route::get('/{id}/delete', [FactureAchatController::class , 'delete'])->name('delete_facture_achat');
    Route::post('/{id}', [FactureAchatController::class , 'add_achat'])->name('add_achat');

});

// inventaire 

Route::group(['prefix'=> 'inventaire' ,  "middleware" => "auth"] , function(){
    Route::get('/{type}' , [InventaireController::class , 'index'])->name('inventaire');
    Route::get('/{id}/delete', [InventaireController::class , 'delete'])->name('delete_inventaire');

});

// verification de caise
Route::get('/verification_caise/{id}' , [VerificationCaiseController::class , 'index']) ;