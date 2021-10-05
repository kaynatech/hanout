<?php

namespace App\Observers;

use App\Models\Perte;
use App\Models\Inventaire;
use Illuminate\Support\Facades\Auth;


class PerteObserver
{
    /**
     * Handle the Perte "created" event.
     *
     * @param  \App\Models\Perte  $perte
     * @return void
     */
    public function created(Perte $perte)
    {
        $article = $perte->article ;
            Inventaire::create([
                'article_id' => $perte->article_id,
                'quantite' => $article->quantite,
                'type' => 'perte',
                'valide' => 0,
                'user_id' => Auth::user()->id 
            ]);
    }

    /**
     * Handle the Perte "updated" event.
     *
     * @param  \App\Models\Perte  $perte
     * @return void
     */
    public function updated(Perte $perte)
    {
        //
    }

    /**
     * Handle the Perte "deleted" event.
     *
     * @param  \App\Models\Perte  $perte
     * @return void
     */
    public function deleted(Perte $perte)
    {
        //
    }

    /**
     * Handle the Perte "restored" event.
     *
     * @param  \App\Models\Perte  $perte
     * @return void
     */
    public function restored(Perte $perte)
    {
        //
    }

    /**
     * Handle the Perte "force deleted" event.
     *
     * @param  \App\Models\Perte  $perte
     * @return void
     */
    public function forceDeleted(Perte $perte)
    {
        //
    }
}
