<?php 

namespace IDTitanium\PetShopNotifier;

use IDTitanium\PetShopNotifier\Providers\EventServiceProvider;
use Illuminate\Support\ServiceProvider;

class PetShopNotifierServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('notifier', function ($app) {
            return new PetShopNotifier();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'petshopnotifier');

        $this->app->register(EventServiceProvider::class);
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