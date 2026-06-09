<?php

/**
 * Description of WebhookEventType.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Consts;

enum WebhookEventType: string
{
    case DASHER_CONFIRMED = 'DASHER_CONFIRMED';
    case DASHER_CONFIRMED_PICKUP_ARRIVAL = 'DASHER_CONFIRMED_PICKUP_ARRIVAL';
    case DASHER_PICKED_UP = 'DASHER_PICKED_UP';
    case DASHER_CONFIRMED_DROPOFF_ARRIVAL = 'DASHER_CONFIRMED_DROPOFF_ARRIVAL';
    case DASHER_DROPPED_OFF = 'DASHER_DROPPED_OFF';
    case DELIVERY_CANCELLED = 'DELIVERY_CANCELLED';
    case DELIVERY_RETURN_INITIALIZED = 'DELIVERY_RETURN_INITIALIZED';
    case DASHER_CONFIRMED_RETURN_ARRIVAL = 'DASHER_CONFIRMED_RETURN_ARRIVAL';
    case DELIVERY_RETURNED = 'DELIVERY_RETURNED';
    case DELIVERY_BATCHED = 'DELIVERY_BATCHED';

    public function isDeliveryCompleted(): bool
    {
        return $this === self::DASHER_DROPPED_OFF;
    }

    public function isDeliveryCancelled(): bool
    {
        return $this === self::DELIVERY_CANCELLED;
    }

    public function isDeliveryFailed(): bool
    {
        return in_array($this, [
            self::DELIVERY_CANCELLED,
            self::DELIVERY_RETURN_INITIALIZED,
        ], true);
    }

    public function isDasherAssigned(): bool
    {
        return in_array($this, [
            self::DASHER_CONFIRMED,
            self::DASHER_CONFIRMED_PICKUP_ARRIVAL,
            self::DASHER_PICKED_UP,
            self::DASHER_CONFIRMED_DROPOFF_ARRIVAL,
            self::DASHER_DROPPED_OFF,
        ], true);
    }

    public function isPickedUp(): bool
    {
        return $this === self::DASHER_PICKED_UP;
    }

    public function isReturnEvent(): bool
    {
        return in_array($this, [
            self::DELIVERY_RETURN_INITIALIZED,
            self::DASHER_CONFIRMED_RETURN_ARRIVAL,
            self::DELIVERY_RETURNED,
        ], true);
    }
}
