<?php

/**
 * Description of DoorDashDriveConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client;

use Dots\DoorDashDrive\Client\DTO\DoorDashDriveAuthDTO;
use Dots\DoorDashDrive\Client\Exceptions\DoorDashDriveException;
use Dots\DoorDashDrive\Client\Requests\Deliveries\CancelDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\CreateDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\CreateDeliveryDTO;
use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\UpdateDeliveryDTO;
use Dots\DoorDashDrive\Client\Requests\Deliveries\GetDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\UpdateDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\CreateQuoteRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\DTO\CreateQuoteDTO;
use Dots\DoorDashDrive\Client\Responses\Deliveries\DeliveryResponseDTO;
use Dots\DoorDashDrive\Client\Responses\ErrorResponseDTO;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Throwable;

class DoorDashDriveConnector extends Connector
{
    use AlwaysThrowOnErrors;

    private const string BASE_URL = 'https://openapi.doordash.com';

    public function __construct(
        private readonly DoorDashDriveAuthDTO $authDto,
    ) {
        $jwtGenerator = new DoorDashDriveJwtGenerator($this->authDto);
        $this->withTokenAuth($jwtGenerator->generate());
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    // --- Deliveries ---

    /**
     * @throws DoorDashDriveException
     */
    public function createDelivery(CreateDeliveryDTO $dto): DeliveryResponseDTO
    {
        return $this->send(new CreateDeliveryRequest($dto))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function getDelivery(string $externalDeliveryId): DeliveryResponseDTO
    {
        return $this->send(new GetDeliveryRequest($externalDeliveryId))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function updateDelivery(
        string $externalDeliveryId,
        UpdateDeliveryDTO $dto,
    ): DeliveryResponseDTO {
        return $this->send(new UpdateDeliveryRequest($externalDeliveryId, $dto))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function cancelDelivery(string $externalDeliveryId): DeliveryResponseDTO
    {
        return $this->send(new CancelDeliveryRequest($externalDeliveryId))->dto();
    }

    // --- Quotes ---

    /**
     * @throws DoorDashDriveException
     */
    public function createQuote(CreateQuoteDTO $dto): DeliveryResponseDTO
    {
        return $this->send(new CreateQuoteRequest($dto))->dto();
    }

    // --- Configuration ---

    public function resolveBaseUrl(): string
    {
        return self::BASE_URL;
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return new DoorDashDriveException($errorResponse);
    }

    public function getAuthDTO(): DoorDashDriveAuthDTO
    {
        return $this->authDto;
    }
}
