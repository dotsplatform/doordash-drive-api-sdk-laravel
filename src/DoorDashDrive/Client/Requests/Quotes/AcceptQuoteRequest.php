<?php

/**
 * Description of AcceptQuoteRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Quotes;

use Dots\DoorDashDrive\Client\Requests\PostDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\DTO\AcceptQuoteDTO;
use Dots\DoorDashDrive\Client\Responses\Deliveries\DeliveryResponseDTO;
use Saloon\Http\Response;

class AcceptQuoteRequest extends PostDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/drive/v2/quotes/%s/accept';

    public function __construct(
        protected readonly string $externalDeliveryId,
        protected readonly AcceptQuoteDTO $dto,
    ) {
    }

    protected function defaultBody(): array
    {
        return array_filter($this->dto->toArray(), fn ($value) => $value !== null);
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
