<?php 

namespace IDTitanium\PetShopNotifier;

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;

class PetShopNotifier
{
    /**
     * Trigger notifications for orders
     */
    public function notify(?string $orderUuid, ?string $status, ?string $updatedAt) {
        if (isset($orderUuid, $status, $updatedAt)) {
            OrderStatusUpdated::dispatch($orderUuid, $status, $updatedAt);
        }
    }
}