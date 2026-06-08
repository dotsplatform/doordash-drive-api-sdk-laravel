<?php
/**
 * Description of GetDeliveryDoorDashDriveCommand.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Commands;

use Dots\DoorDashDrive\Client\Exceptions\DoorDashDriveException;

class GetDeliveryDoorDashDriveCommand extends BaseDoorDashDriveCommand
{
    public $signature = 'doordash-drive:delivery:get {externalDeliveryId}';

    public function handle(): void
    {
        $connector = $this->getDoorDashDriveConnector();

        try {
            $response = $connector->getDelivery(
                $this->argument('externalDeliveryId'),
            );

            $this->info('Delivery ID: ' . $response->getExternalDeliveryId());
            $this->info('Status: ' . ($response->getDeliveryStatus()?->value ?? 'unknown'));
            $this->info('Tracking URL: ' . ($response->getTrackingUrl() ?? 'N/A'));
            $this->info('Fee: ' . ($response->getFee() ?? 'N/A'));
            $this->info('Dasher: ' . ($response->getDasherName() ?? 'Not assigned'));
        } catch (DoorDashDriveException $e) {
            $this->error($e->getErrorResponseDTO()->getMessage());
        }
    }
}
