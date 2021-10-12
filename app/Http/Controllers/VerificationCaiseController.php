<?php

namespace App\Http\Controllers;
 
use App\Models\Caise;
use App\Models\User;
use App\Models\VerificationCaise;
use Illuminate\Http\Request;

class VerificationCaiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){
       $verification = VerificationCaise::where('user_id' , $id)->orderBy('created_at', 'desc')->take(1)->first();
       if(!$verification){
           $verification = VerificationCaise::create([
               'user_id' => $id ,
               'a5' => 0,
               'a10'=> 0,
               'a20'=> 0,
               'a50'=> 0,
               'a100'=> 0,
               'a200'=> 0,
               'a500'=> 0,
               'a1000'=> 0,
               'a2000'=> 0,
               'total'=> 0,
               'decalage'=> 0,
               'caise_reel'=> User::find($id)->caisse->valeur,
               'caise_id' => User::find($id)->caisse->id,
               'user_id'=> $id,
               'changer_id' => $id,
               'ventes' => 0,
           ]);
       }
       $caise = User::find($id)->caisse ;
       return view('verification_caise.index', [
           'verification' => $verification ,
           'caisse'=> $caise
       ]);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VerificationCaise::create([
            'a5' => $request->a5,
            'a10'=> $request->a10,
            'a20'=> $request->a20,
            'a50'=> $request->a50,
            'a100'=> $request->a100,
            'a200'=> $request->a200,
            'a500'=> $request->a500,
            'a1000'=> $request->a1000,
            'a2000'=> $request->a2000,
            'total'=> $request->total,
            'decalage'=> $request->decalage,
            'caise_reel'=> $request->caise_reel,
            'user_id'=> $request->user_id,
            'changer_id' => $request->user()->id,
            'ventes' => $request->ventes,
        ]);
    }
}
