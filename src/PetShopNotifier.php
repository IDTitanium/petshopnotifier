<?php

declare(strict_types=1);

namespace IDTitanium\PetShopNotifier;

use IDTitanium\PetShopNotifier\Events\OrderStatusUpdated;

class PetShopNotifier
{
    /**
     * Trigger notifications for orders
     */
    public function notify(?string $orderUuid, ?string $status, ?string $updatedAt): void
    {
        if (isset($orderUuid, $status, $updatedAt)) {
            OrderStatusUpdated::dispatch($orderUuid, $status, $updatedAt);
        }
    }
}
