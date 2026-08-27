<?php

/**
 * Description of BusinessActivationStatus.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Consts;

enum BusinessActivationStatus: string
{
    case INITIATED = 'initiated';
    case PENDING_EXTERNAL_ACTIVATION = 'pending_external_activation';
    case PENDING_LEGAL_AGREEMENT = 'pending_legal_agreement';
    case ABANDONED = 'abandoned';
    case FAILED = 'failed';
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function isActive(): bool
    {
        return $this === self::ACTIVE;
    }
}
