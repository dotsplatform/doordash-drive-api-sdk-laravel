<?php

/**
 * Description of BaseDoorDashDriveRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseDoorDashDriveRequest extends Request
{
    protected Method $method = Method::GET;
}
