<?php 

namespace IDTitanium\PetShopNotifier\Listeners;

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;
use Illuminate\Support\Facades\Http;

class SendTeamsNotification
{
    private $orderUuid;
    private $status;
    private $updatedAt;

    public function handle(OrderStatusUpdated $event)
    {
        $this->orderUuid = $event->orderUuid;
        $this->status = $event->status;
        $this->updatedAt = $event->updatedAt;

        $this->sendNotification();
    }

    private function sendNotification() {
        $url = config('petshopnotifier.ms_teams_webhook_url');
        $jsonData = $this->constructCardJson();

        Http::post($url, $jsonData);
    }

    private function constructCardJson() {
       $json =  [
            "@type" => "MessageCard",
            "@context" => "http://schema.org/extensions",
            "themeColor" => "0076D7",
            "summary" => "Order status updated",
            "sections" => [
                [
                    "activityTitle" => "Order status updated",
                    "activityImage" => "https://adaptivecards.io/content/cats/3.png",
                    "facts" => [
                        [
                            "name" => "Order UUID",
                            "value" => $this->orderUuid
                        ],
                        [
                            "name" => "Updated At",
                            "value" => $this->updatedAt
                        ],
                        [
                            "name" => "New Status",
                            "value" => $this->status
                        ]
                    ]
                ]
            ],
            "potentialAction" => [
                [
                    "@type" => "ActionCard",
                    "name" => "View the Order",
                    "target" => config('petshopnotifier.orders_dashboard_base_url') . '/' . $this->orderUuid
                ]
            ]
       ];

       return json_encode($json);
    }
}