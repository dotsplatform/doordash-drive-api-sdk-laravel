<?php

/**
 * Description of GetBusinessesRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\BaseDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Resources\Consts\BusinessActivationStatus;
use Dots\DoorDashDrive\Client\Responses\Businesses\BusinessListResponseDTO;
use Saloon\Http\Response;

class GetBusinessesRequest extends BaseDoorDashDriveRequest
{
    private const string ENDPOINT = '/developer/v1/businesses';

    public function __construct(
        protected readonly ?BusinessActivationStatus $activationStatus = null,
        protected readonly ?string $continuationToken = null,
    ) {
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'activationStatus' => $this->activationStatus?->value,
            'continuationToken' => $this->continuationToken,
        ], fn ($value) => $value !== null);
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function createDtoFromResponse(Response $response): BusinessListResponseDTO
    {
        return BusinessListResponseDTO::fromResponse($response);
    }
}
