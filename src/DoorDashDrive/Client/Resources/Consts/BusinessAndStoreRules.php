<?php

/**
 * Description of BusinessAndStoreRules.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Consts;

/**
 * Constraints DoorDash applies to business and store payloads.
 */
abstract class BusinessAndStoreRules
{
    public const string EXTERNAL_ID_PATTERN = '/^[A-Za-z0-9_-]{3,64}$/';

    public const int EXTERNAL_ID_MIN_LENGTH = 3;

    public const int EXTERNAL_ID_MAX_LENGTH = 64;

    /**
     * Business created for every developer during onboarding. It cannot be created
     * again, but it can be read and updated under this identifier.
     */
    public const string DEFAULT_BUSINESS_ID = 'default';

    public const int DESCRIPTION_MAX_LENGTH = 100;
}
