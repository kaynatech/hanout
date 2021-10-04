<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model_type' => 'App\\Models\\Article',
                'model_id' => 1712,
                'uuid' => '4fb1a85c-ed0b-4b7c-a0e0-7d9a5626ccb6',
                'collection_name' => 'default',
                'name' => '3RSMOOMEaBPiEdmM5WiUzxEUKJf6kpF27PvMKWxj',
                'file_name' => '3RSMOOMEaBPiEdmM5WiUzxEUKJf6kpF27PvMKWxj.png',
                'mime_type' => 'image/png',
                'disk' => 'google',
                'conversions_disk' => 'google',
                'size' => 163479,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 1,
                'created_at' => '2021-09-28 13:47:03',
                'updated_at' => '2021-09-28 13:47:03',
            ),
            1 => 
            array (
                'id' => 2,
                'model_type' => 'App\\Models\\Categorie',
                'model_id' => 2,
                'uuid' => '0e6cfb56-148f-41b0-b8b1-e71b3387b880',
                'collection_name' => 'default',
                'name' => 'HNY2r63KeBqZsMOyMfX8baW39Cpubcv03OU4HFNN',
                'file_name' => 'HNY2r63KeBqZsMOyMfX8baW39Cpubcv03OU4HFNN.png',
                'mime_type' => 'image/png',
                'disk' => 'google',
                'conversions_disk' => 'google',
                'size' => 163479,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => 2,
                'created_at' => '2021-09-28 13:49:24',
                'updated_at' => '2021-09-28 13:49:24',
            ),
        ));
        
        
    }
}