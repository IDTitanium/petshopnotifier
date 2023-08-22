<?php

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;
use IDTitanium\PetShopNotifier\Listeners\SendTeamsNotification;
use IDTitanium\PetShopNotifier\Tests\TestCase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class ListenerTest extends TestCase
{
    function test_listener_can_send_notification()
    {
        Http::fake([
            config('petshopnotifier.ms_teams_webhook_url') => Http::response('ok')
        ]);

        $orderUuid = fake()->uuid();

        (new SendTeamsNotification)->handle(new OrderStatusUpdated($orderUuid, fake()->colorName(), now()->toDateTimeString()));

        Http::assertSent(function (Request $request) {
            return $request->url() == config('petshopnotifier.ms_teams_webhook_url');
        });
    }
}