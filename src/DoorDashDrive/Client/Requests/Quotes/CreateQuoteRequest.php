<?php
/**
 * Description of CreateQuoteRequest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Quotes;

use Dots\DoorDashDrive\Client\Requests\PostDoorDashDriveRequest;
use Dots\DoorDashDrive\Client\Requests\Quotes\DTO\CreateQuoteDTO;
use Dots\DoorDashDrive\Client\Responses\Deliveries\DeliveryResponseDTO;
use Saloon\Http\Response;

class CreateQuoteRequest extends PostDoorDashDriveRequest
{
    private const string ENDPOINT = '/drive/v2/quotes';

    public function __construct(
        protected readonly CreateQuoteDTO $dto,
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
