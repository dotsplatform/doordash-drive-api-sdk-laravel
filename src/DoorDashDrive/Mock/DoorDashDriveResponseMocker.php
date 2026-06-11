<?php

/**
 * Description of DoorDashDriveResponseMocker.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Mock;

use Dots\DoorDashDrive\Client\Requests\Deliveries\CancelDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\CreateDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\GetDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\UpdateDeliveryRequest;
use Dots\DoorDashDrive\Mock\Data\DeliveryResponseGenerator;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class DoorDashDriveResponseMocker
{
    public static function mockSuccessCreateDelivery(array $data = []): array
    {
        $deliveryData = DeliveryResponseGenerator::generate($data);

        MockClient::global([
            CreateDeliveryRequest::class => MockResponse::make($deliveryData, 200),
        ]);

        return $deliveryData;
    }

    public static function mockSuccessGetDelivery(array $data = []): array
    {
        $deliveryData = DeliveryResponseGenerator::generate($data);

        MockClient::global([
            GetDeliveryRequest::class => MockResponse::make($deliveryData, 200),
        ]);

        return $deliveryData;
    }

    public static function mockSuccessUpdateDelivery(array $data = []): array
    {
        $deliveryData = DeliveryResponseGenerator::generate($data);

        MockClient::global([
            UpdateDeliveryRequest::class => MockResponse::make($deliveryData, 200),
        ]);

        return $deliveryData;
    }

    public static function mockSuccessCancelDelivery(array $data = []): void
    {
        $deliveryData = DeliveryResponseGenerator::generate(array_merge([
            'delivery_status' => 'cancelled',
        ], $data));

        MockClient::global([
            CancelDeliveryRequest::class => MockResponse::make($deliveryData, 200),
        ]);
    }
}
