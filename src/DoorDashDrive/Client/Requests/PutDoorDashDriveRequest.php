<?php

/**
 * Description of PutDoorDashDriveRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

abstract class PutDoorDashDriveRequest extends BaseDoorDashDriveRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
}
