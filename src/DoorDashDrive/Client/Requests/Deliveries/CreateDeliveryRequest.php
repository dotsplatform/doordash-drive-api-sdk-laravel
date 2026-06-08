<?php
/**
 * Description of CreateDeliveryRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Deliveries;

use Dots\DoorDashDrive\Client\Requests\Deliveries\DTO\CreateDeliveryDTO;
use Dots\DoorDashDrive\Client\Requests\PostDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Responses\Deliveries\DeliveryResponseDTO;
use Saloon\Http\Response;

class CreateDeliveryRequest extends PostDoorDashDriveRequest
{
    private const string ENDPOINT = '/drive/v2/deliveries';

    public function __construct(
        protected readonly CreateDeliveryDTO $dto,
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

    public function createDtoFromResponse(Response $response): DeliveryResponseDTO
    {
        return DeliveryResponseDTO::fromResponse($response);
    }
}
