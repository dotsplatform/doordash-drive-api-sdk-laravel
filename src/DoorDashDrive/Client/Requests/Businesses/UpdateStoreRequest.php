<?php

/**
 * Description of UpdateStoreRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses;

use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\UpdateStoreDTO;
use Dots\DoorDashDrive\Client\Requests\PatchDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Resources\Business\StoreDTO;
use Saloon\Http\Response;

class UpdateStoreRequest extends PatchDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/developer/v1/businesses/%s/stores/%s';

    public function __construct(
        protected readonly string $externalBusinessId,
        protected readonly string $externalStoreId,
        protected readonly UpdateStoreDTO $dto,
    ) {
    }

    /**
     * The endpoint is a partial update, so null values are dropped instead of being
     * sent as explicit nulls that would erase the stored attributes.
     */
    protected function defaultBody(): array
    {
        return array_filter($this->dto->toArray(), fn ($value) => $value !== null);
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
