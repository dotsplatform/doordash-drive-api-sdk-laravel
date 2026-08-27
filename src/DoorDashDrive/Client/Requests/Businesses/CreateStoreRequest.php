<?php

/**
 * Description of CreateStoreRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\CreateStoreDTO;
use Dots\DoorDashDrive\Client\Requests\PostDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Resources\Business\StoreDTO;
use Saloon\Http\Response;

class CreateStoreRequest extends PostDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/developer/v1/businesses/%s/stores';

    public function __construct(
        protected readonly string $externalBusinessId,
        protected readonly CreateStoreDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return array_filter($this->dto->toArray(), fn ($value) => $value !== null);
    }

    public function resolveEndpoint(): string
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $this->externalBusinessId);
    }

    public function createDtoFromResponse(Response $response): StoreDTO
    {
        return StoreDTO::fromArray($response->json());
    }
}
