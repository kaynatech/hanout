<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CaisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('caises')->delete();
        
        \DB::table('caises')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'init',
                'valeur_articles' => 0,
                'valeur' => 0,
                'changement' => 0,
                'user_id' => 2,
                'changer_id' => 2,
                'created_at' => '2021-10-03 14:54:14',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'init',
                'valeur_articles' => 0,
                'valeur' => 0,
                'changement' => 0,
                'user_id' => 3,
                'changer_id' => 3,
                'created_at' => '2021-10-03 14:54:44',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}