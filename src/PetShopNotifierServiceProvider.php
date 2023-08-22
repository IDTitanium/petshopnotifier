<?php 

namespace IDTitanium\PetShopNotifier;

use Illuminate\Support\ServiceProvider;

class PetShopNotifierServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('notifier', function ($app) {
            return new PetShopNotifier();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'petshopnotifier');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
              __DIR__.'/../config/config.php' => config_path('petshopnotifier.php'),
            ], 'config');
        
          }
    }
}