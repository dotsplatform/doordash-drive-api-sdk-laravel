<?php

/**
 * Description of DoorDashDriveConnector.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client;

use Dots\DoorDashDrive\Client\DTO\DoorDashDriveAuthDTO;
use Dots\DoorDashDrive\Client\Exceptions\DoorDashDriveException;
use Dots\DoorDashDrive\Client\Requests\Businesses\CreateBusinessRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\CreateStoreRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\CreateBusinessDTO;
use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\CreateStoreDTO;
use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\UpdateBusinessDTO;
use Dots\DoorDashDrive\Client\Requests\Businesses\DTO\UpdateStoreDTO;
use Dots\DoorDashDrive\Client\Requests\Businesses\GetBusinessesRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\GetBusinessRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\GetStoreRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\GetStoresRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\UpdateBusinessRequest;
use Dots\DoorDashDrive\Client\Requests\Businesses\UpdateStoreRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\CancelDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\CreateDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\CreateDeliveryDTO;
use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\UpdateDeliveryDTO;
use Dots\DoorDashDrive\Client\Requests\Deliveries\GetDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Deliveries\UpdateDeliveryRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\AcceptQuoteRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\CreateQuoteRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\DTO\AcceptQuoteDTO;
use Dots\DoorDashDrive\Client\Requests\Quotes\DTO\CreateQuoteDTO;
use Dots\DoorDashDrive\Client\Resources\Business\BusinessDTO;
use Dots\DoorDashDrive\Client\Resources\Business\StoreDTO;
use Dots\DoorDashDrive\Client\Resources\Consts\BusinessActivationStatus;
use Dots\DoorDashDrive\Client\Resources\Consts\StoreActivationStatus;
use Dots\DoorDashDrive\Client\Responses\Businesses\BusinessListResponseDTO;
use Dots\DoorDashDrive\Client\Responses\Businesses\StoreListResponseDTO;
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

    /**
     * @throws DoorDashDriveException
     */
    public function acceptQuote(string $externalDeliveryId, AcceptQuoteDTO $dto): DeliveryResponseDTO
    {
        return $this->send(new AcceptQuoteRequest($externalDeliveryId, $dto))->dto();
    }

    // --- Businesses & Stores ---

    /**
     * A single page holds up to 100 businesses. Pass the continuation token of the
     * previous page to read the next one.
     *
     * @throws DoorDashDriveException
     */
    public function getBusinesses(
        ?BusinessActivationStatus $activationStatus = null,
        ?string $continuationToken = null,
    ): BusinessListResponseDTO {
        return $this->send(
            new GetBusinessesRequest($activationStatus, $continuationToken),
        )->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function getBusiness(string $externalBusinessId): BusinessDTO
    {
        return $this->send(new GetBusinessRequest($externalBusinessId))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function createBusiness(CreateBusinessDTO $dto): BusinessDTO
    {
        return $this->send(new CreateBusinessRequest($dto))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function updateBusiness(
        string $externalBusinessId,
        UpdateBusinessDTO $dto,
    ): BusinessDTO {
        return $this->send(new UpdateBusinessRequest($externalBusinessId, $dto))->dto();
    }

    /**
     * A single page holds up to 100 stores. Pass the continuation token of the
     * previous page to read the next one.
     *
     * @throws DoorDashDriveException
     */
    public function getStores(
        string $externalBusinessId,
        ?StoreActivationStatus $activationStatus = null,
        ?string $continuationToken = null,
    ): StoreListResponseDTO {
        return $this->send(
            new GetStoresRequest($externalBusinessId, $activationStatus, $continuationToken),
        )->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function getStore(string $externalBusinessId, string $externalStoreId): StoreDTO
    {
        return $this->send(new GetStoreRequest($externalBusinessId, $externalStoreId))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function createStore(string $externalBusinessId, CreateStoreDTO $dto): StoreDTO
    {
        return $this->send(new CreateStoreRequest($externalBusinessId, $dto))->dto();
    }

    /**
     * @throws DoorDashDriveException
     */
    public function updateStore(
        string $externalBusinessId,
        string $externalStoreId,
        UpdateStoreDTO $dto,
    ): StoreDTO {
        return $this->send(
            new UpdateStoreRequest($externalBusinessId, $externalStoreId, $dto),
        )->dto();
    }

    // --- Configuration ---

    public function resolveBaseUrl(): string
    {
        return self::BASE_URL;
    }

    public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
    {
        $errorResponse = ErrorResponseDTO::fromResponse($response);

        return new DoorDashDriveException(
            $errorResponse,
            $errorResponse->getMessage(),
            $response->status(),
            $senderException,
        );
    }

    public function getAuthDTO(): DoorDashDriveAuthDTO
    {
        return $this->authDto;
    }
}
