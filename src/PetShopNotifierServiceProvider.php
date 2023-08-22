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
    }

    public function boot()
    {

    }
}