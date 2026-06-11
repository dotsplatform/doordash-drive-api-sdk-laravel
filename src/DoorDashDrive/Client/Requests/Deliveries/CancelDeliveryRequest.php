<?php

/**
 * Description of CancelDeliveryRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Deliveries;

use Dots\DoorDashDrive\Client\Requests\BaseDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Responses\Deliveries\DeliveryResponseDTO;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class CancelDeliveryRequest extends BaseDoorDashDriveRequest
{
    protected Method $method = Method::PUT;

    private const string ENDPOINT_TEMPLATE = '/drive/v2/deliveries/%s/cancel';

    public function __construct(
        protected readonly string $externalDeliveryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->externalDeliveryId);
    }

    public function createDtoFromResponse(Response $response): DeliveryResponseDTO
    {
        return DeliveryResponseDTO::fromResponse($response);
    }
}
