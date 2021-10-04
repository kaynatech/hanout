<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WilayasTableSeeder::class);
        $this->call(FournisseursTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(AchatsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(CaisesTableSeeder::class);
    }
}
