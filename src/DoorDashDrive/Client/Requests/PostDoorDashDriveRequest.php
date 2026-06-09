<?php

/**
 * Description of PostDoorDashDriveRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

abstract class PostDoorDashDriveRequest extends BaseDoorDashDriveRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
}
