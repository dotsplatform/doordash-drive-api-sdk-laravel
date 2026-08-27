<?php

/**
 * Description of GetStoreRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\BaseDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Resources\Business\StoreDTO;
use Saloon\Http\Response;

class GetStoreRequest extends BaseDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/developer/v1/businesses/%s/stores/%s';

    public function __construct(
        protected readonly string $externalBusinessId,
        protected readonly string $externalStoreId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(
            self::ENDPOINT_TEMPLATE,
            $this->externalBusinessId,
            $this->externalStoreId,
        );
    }

    public function createDtoFromResponse(Response $response): StoreDTO
    {
        return StoreDTO::fromArray($response->json());
    }
}
