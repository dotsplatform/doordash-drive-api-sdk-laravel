<?php
/**
 * Description of UpdateDeliveryRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Deliveries;

use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\UpdateDeliveryDTO;
use Dots\DoorDashDrive\Client\Requests\PutDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Responses\Deliveries\DeliveryResponseDTO;
use Saloon\Http\Response;

class UpdateDeliveryRequest extends PutDoorDashDriveRequest
{
    private const string ENDPOINT_TEMPLATE = '/drive/v2/deliveries/%s';

    public function __construct(
        protected readonly string $externalDeliveryId,
        protected readonly UpdateDeliveryDTO $dto,
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
