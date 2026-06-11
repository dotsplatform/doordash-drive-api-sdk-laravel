<?php

/**
 * Description of GetStoresRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\BaseDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Responses\Businesses\StoreListResponseDTO;
use Saloon\Http\Response;

class GetStoresRequest extends BaseDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/developer/v1/businesses/%s/stores';

    public function __construct(
        protected readonly string $externalBusinessId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->externalBusinessId);
    }

    public function createDtoFromResponse(Response $response): StoreListResponseDTO
    {
        return StoreListResponseDTO::fromResponse($response);
    }
}
