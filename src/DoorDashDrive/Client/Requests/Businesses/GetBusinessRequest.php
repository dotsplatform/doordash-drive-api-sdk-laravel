<?php

/**
 * Description of GetBusinessRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\BaseDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Resources\Business\BusinessDTO;
use Saloon\Http\Response;

class GetBusinessRequest extends BaseDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/developer/v1/businesses/%s';

    public function __construct(
        protected readonly string $externalBusinessId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->externalBusinessId);
    }

    public function createDtoFromResponse(Response $response): BusinessDTO
    {
        return BusinessDTO::fromArray($response->json());
    }
}
