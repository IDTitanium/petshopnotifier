<?php 

namespace IDTitanium\PetShopNotifier\Providers;

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;
use IDTitanium\PetShopNotifier\Listeners\SendTeamsNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider 
{
    protected $listen = [
        OrderStatusUpdated::class => [
            SendTeamsNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}