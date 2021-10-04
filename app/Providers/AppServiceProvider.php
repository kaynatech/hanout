<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Caise;
use App\Observers\CaiseObserver;
use App\Observers\ArticleObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        try{
            \Storage::extend('google', function($app, $config) {
                $options = []; 
                if(!empty($config['teamDriveId']??null)) $options['teamDriveId']=$config['teamDriveId']; 
                $client = new \Google_Client();
                $client->setClientId($config['clientId']);
                $client->setClientSecret($config['clientSecret']);
                $client->refreshToken($config['refreshToken']);
                $service = new \Google_Service_Drive($client);
                $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service,$config['folder']??'/', $options);
                return new \League\Flysystem\Filesystem($adapter);
            });
        }catch(\Exception $e){  }
        
    }
    

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Caise::observe(CaiseObserver::class);
        Article::observe(ArticleObserver::class);
    }
}
