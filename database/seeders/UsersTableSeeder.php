<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'abdou bentegar',
                'email' => 'abdoubentegar@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$W.qJGRVKPlj7DEFB1pELKOaxDoBy6du04iRYAsJFalsbTgLk2QMJu',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'XLbHbA3oZHh2A0hPhStMZJYmK8Ncf6zfbELjKUJbeVUB5M0p03fhPGkGdfOi',
                'created_at' => '2021-09-16 14:18:43',
                'updated_at' => '2021-09-16 14:18:43',
                'level' => 1,
                'role_id' => 4,
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'sid ahmed',
                'email' => 's@enst.dz',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XLe8PS9gEFGnNssPr8UWXuFFk9BnzD1.ivcV97X/N45cj0Fxyk.pK',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-09-16 14:50:56',
                'updated_at' => '2021-09-16 14:50:56',
                'level' => 1,
                'role_id' => 4,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'abdou bentegar',
                'email' => 'test@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iHCp5S2KX8vxByFXwpvf0utO8sAPQGvTR7n4mvrC695n9QA3lOtj6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'created_at' => '2021-09-20 19:59:38',
                'updated_at' => '2021-09-20 19:59:38',
                'level' => 1,
                'role_id' => 3,
            ),
        ));
        
        
    }
}