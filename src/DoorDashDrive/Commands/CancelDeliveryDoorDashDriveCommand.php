<?php

/**
 * Description of CancelDeliveryDoorDashDriveCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Commands;

use Dots\DoorDashDrive\Client\Exceptions\DoorDashDriveException;

class CancelDeliveryDoorDashDriveCommand extends BaseDoorDashDriveCommand
{
    public $signature = 'doordash-drive:delivery:cancel {externalDeliveryId}';

    public function handle(): void
    {
        $connector = $this->getDoorDashDriveConnector();

        try {
            $response = $connector->cancelDelivery(
                $this->argument('externalDeliveryId'),
            );

            $this->info('Delivery cancelled. Status: '.($response->getDeliveryStatus()?->value ?? 'cancelled'));
        } catch (DoorDashDriveException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }
}
