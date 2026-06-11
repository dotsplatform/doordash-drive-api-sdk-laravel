<?php

/**
 * Description of CreateDeliveryDoorDashDriveCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Commands;

use Dots\DoorDashDrive\Client\Exceptions\DoorDashDriveException;
use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\CreateDeliveryDTO;

class CreateDeliveryDoorDashDriveCommand extends BaseDoorDashDriveCommand
{
    public $signature = 'doordash-drive:delivery:create {pickupAddress} {dropoffAddress} {orderValue}';

    public function handle(): void
    {
        $connector = $this->getDoorDashDriveConnector();

        try {
            $response = $connector->createDelivery(
                CreateDeliveryDTO::fromArray([
                    'external_delivery_id' => uniqid('D-'),
                    'pickup_address' => $this->argument('pickupAddress'),
                    'dropoff_address' => $this->argument('dropoffAddress'),
                    'order_value' => (int) $this->argument('orderValue'),
                ]),
            );

            $this->info('Delivery ID: '.$response->getExternalDeliveryId());
            $this->info('Status: '.($response->getDeliveryStatus()?->value ?? 'unknown'));
            $this->info('Tracking URL: '.($response->getTrackingUrl() ?? 'N/A'));
            $this->info('Fee: '.($response->getFee() ?? 'N/A'));
        } catch (DoorDashDriveException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }
}
