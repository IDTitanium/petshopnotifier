<?php 

namespace IDTitanium\PetShopNotifier\Facades;

use Illuminate\Support\Facades\Facade;

class PetShopNotifier extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'notifier';
    }
}