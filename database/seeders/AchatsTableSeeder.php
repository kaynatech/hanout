<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AchatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('achats')->delete();
        
        \DB::table('achats')->insert(array (
            0 => 
            array (
                'id' => 2,
                'article_id' => 1712,
                'fournisseur_id' => 6,
                'quantite' => 900,
                'prix_achat' => 500,
                'total' => 450000,
                'created_at' => '2021-09-16 18:17:51',
                'updated_at' => '2021-09-16 18:17:51',
                'user_id' => NULL,
                'facture_achat_id' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'article_id' => 1712,
                'fournisseur_id' => 6,
                'quantite' => 900,
                'prix_achat' => 500,
                'total' => 450000,
                'created_at' => '2021-09-16 18:18:16',
                'updated_at' => '2021-09-16 18:18:16',
                'user_id' => NULL,
                'facture_achat_id' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'article_id' => 1712,
                'fournisseur_id' => 6,
                'quantite' => 900,
                'prix_achat' => 500,
                'total' => 450000,
                'created_at' => '2021-09-16 18:18:40',
                'updated_at' => '2021-09-16 18:18:40',
                'user_id' => NULL,
                'facture_achat_id' => NULL,
            ),
        ));
        
        
    }
}