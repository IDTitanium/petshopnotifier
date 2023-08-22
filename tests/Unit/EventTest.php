<?php

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;
use IDTitanium\PetShopNotifier\Facades\PetShopNotifier;
use IDTitanium\PetShopNotifier\Tests\TestCase;
use Illuminate\Support\Facades\Event;

class EventTest extends TestCase
{
    function test_an_event_is_triggered_when_facade_is_called()
    {
        Event::fake();
        
        $orderUuid = fake()->uuid();
        PetShopNotifier::notify($orderUuid, fake()->colorName(), now()->toDateTimeString());

        Event::assertDispatched(OrderStatusUpdated::class, function ($event) use ($orderUuid) {
            return $event->orderUuid === $orderUuid;
        });
    }
}