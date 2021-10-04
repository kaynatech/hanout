<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Informatique',
                'level' => 1,
                'categorie_id' => NULL,
                'created_at' => '2021-09-19 14:15:42',
                'updated_at' => '2021-09-19 14:15:42',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Piece Laptop',
                'level' => 2,
                'categorie_id' => 1,
                'created_at' => '2021-09-28 13:49:24',
                'updated_at' => '2021-09-28 13:49:24',
            ),
        ));
        
        
    }
}