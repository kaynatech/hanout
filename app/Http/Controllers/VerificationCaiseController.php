<?php

namespace App\Http\Controllers;

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
       $verification = VerificationCaise::where('user_id' , $id)->orderBy('id', 'desc')->take(1)->first();
       return view('verification_caise.index', [
           'verification' => $verification 
       ]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VerificationCaise  $verificationCaise
     * @return \Illuminate\Http\Response
     */
    public function show(VerificationCaise $verificationCaise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VerificationCaise  $verificationCaise
     * @return \Illuminate\Http\Response
     */
    public function edit(VerificationCaise $verificationCaise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VerificationCaise  $verificationCaise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VerificationCaise $verificationCaise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VerificationCaise  $verificationCaise
     * @return \Illuminate\Http\Response
     */
    public function destroy(VerificationCaise $verificationCaise)
    {
        //
    }
}
