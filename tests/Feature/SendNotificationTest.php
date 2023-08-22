<?php

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;
use IDTitanium\PetShopNotifier\Facades\PetShopNotifier;
use IDTitanium\PetShopNotifier\Listeners\SendTeamsNotification;
use IDTitanium\PetShopNotifier\Tests\TestCase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class SendNotificationTest extends TestCase
{
    function test_notification_is_sent_when_facade_is_called()
    {
        Http::fake([
            config('petshopnotifier.ms_teams_webhook_url') => Http::response('ok')
        ]);

        $orderUuid = fake()->uuid();

        PetShopNotifier::notify($orderUuid, fake()->colorName(), now()->toDateTimeString());

        (new SendTeamsNotification)->handle(new OrderStatusUpdated($orderUuid, fake()->colorName(), now()->toDateTimeString()));

        Http::assertSent(function (Request $request) {
            return $request->url() == config('petshopnotifier.ms_teams_webhook_url');
        });
    }
}