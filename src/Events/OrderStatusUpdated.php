<?php

declare(strict_types=1);

namespace IDTitanium\PetShopNotifier\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct(public string $orderUuid, public string $status, public string $updatedAt)
    {
    }
}
