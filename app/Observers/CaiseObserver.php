<?php

namespace App\Observers;

use App\Models\Caise;

class CaiseObserver
{
    /**
     * Handle the Caise "created" event.
     *
     * @param  \App\Models\Caise  $caise
     * @return void
     */
    public function created(Caise $caise)
    {
        $articles_total = $caise->proprietaire->articles->sum(function ($article){
            return $article->quantite * $article->prix ;
        });
        $caise->valeur_articles = $articles_total ;
        $caise->save();
    }

    /**
     * Handle the Caise "updated" event.
     *
     * @param  \App\Models\Caise  $caise
     * @return void
     */
    public function updated(Caise $caise)
    {
        //
    }

    /**
     * Handle the Caise "deleted" event.
     *
     * @param  \App\Models\Caise  $caise
     * @return void
     */
    public function deleted(Caise $caise)
    {
        //
    }

    /**
     * Handle the Caise "restored" event.
     *
     * @param  \App\Models\Caise  $caise
     * @return void
     */
    public function restored(Caise $caise)
    {
        //
    }

    /**
     * Handle the Caise "force deleted" event.
     *
     * @param  \App\Models\Caise  $caise
     * @return void
     */
    public function forceDeleted(Caise $caise)
    {
        //
    }
}
