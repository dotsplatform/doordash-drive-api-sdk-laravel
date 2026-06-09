<?php

/**
 * Description of DeliveryStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Consts;

enum DeliveryStatus: string
{
    case CREATED = 'created';
    case CONFIRMED = 'confirmed';
    case ENROUTE_TO_PICKUP = 'enroute_to_pickup';
    case ARRIVED_AT_PICKUP = 'arrived_at_pickup';
    case PICKED_UP = 'picked_up';
    case ENROUTE_TO_DROPOFF = 'enroute_to_dropoff';
    case ARRIVED_AT_DROPOFF = 'arrived_at_dropoff';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
    case ENROUTE_TO_RETURN = 'enroute_to_return';
    case RETURNED = 'returned';

    public function isCompleted(): bool
    {
        return $this === self::DELIVERED;
    }

    public function isCancelled(): bool
    {
        return $this === self::CANCELLED;
    }

    public function isFinal(): bool
    {
        return in_array($this, [
            self::DELIVERED,
            self::CANCELLED,
            self::RETURNED,
        ], true);
    }

    public function isDasherAssigned(): bool
    {
        return in_array($this, [
            self::CONFIRMED,
            self::ENROUTE_TO_PICKUP,
            self::ARRIVED_AT_PICKUP,
            self::PICKED_UP,
            self::ENROUTE_TO_DROPOFF,
            self::ARRIVED_AT_DROPOFF,
        ], true);
    }

    public function isDasherEnRoute(): bool
    {
        return in_array($this, [
            self::ENROUTE_TO_PICKUP,
            self::ENROUTE_TO_DROPOFF,
        ], true);
    }

    public function isPickedUp(): bool
    {
        return in_array($this, [
            self::PICKED_UP,
            self::ENROUTE_TO_DROPOFF,
            self::ARRIVED_AT_DROPOFF,
            self::DELIVERED,
        ], true);
    }
}
