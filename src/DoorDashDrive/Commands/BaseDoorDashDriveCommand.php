<?php

/**
 * Description of BaseDoorDashDriveCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Commands;

use Dots\DoorDashDrive\Client\DoorDashDriveConnector;
use Illuminate\Console\Command;

abstract class BaseDoorDashDriveCommand extends Command
{
    protected function getDoorDashDriveConnector(): DoorDashDriveConnector
    {
        return app(DoorDashDriveConnector::class);
    }
}
