<?php

/**
 * Description of CreateBusinessRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\CreateBusinessDTO;
use Dots\DoorDashDrive\Client\Requests\PostDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Resources\Business\BusinessDTO;
use Saloon\Http\Response;

class CreateBusinessRequest extends PostDoorDashDriveRequest
{
    private const string ENDPOINT = '/developer/v1/businesses';

    public function __construct(
        protected readonly CreateBusinessDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return array_filter($this->dto->toArray(), fn ($value) => $value !== null);
    }

    public function resolveEndpoint(): string
    {
        return self::ENDPOINT;
    }

    public function createDtoFromResponse(Response $response): BusinessDTO
    {
        return BusinessDTO::fromArray($response->json());
    }
}
