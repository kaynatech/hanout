<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article ;

class updatePrixCommande extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update articles';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $this->info("updating the articles") ;
        $articles = Article::prixPositive()->get();
        foreach($articles as $article){
        
            $this->info("updating the article $article->prixAchat") ;
            $article->update([
                "prix" => $article->prix_achat 
            ]);
        }
    }
}
