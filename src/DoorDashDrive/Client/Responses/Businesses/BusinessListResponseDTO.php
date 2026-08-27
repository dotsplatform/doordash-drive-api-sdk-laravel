<?php

/**
 * Description of BusinessListResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Responses\Businesses;

use Dots\DoorDashDrive\Client\Resources\Business\BusinessDTO;
use Dots\DoorDashDrive\Client\Responses\DoorDashDriveResponseDTO;
use Saloon\Http\Response;

class BusinessListResponseDTO extends DoorDashDriveResponseDTO
{
    protected int $result_count;

    protected ?string $continuation_token;

    /** @var BusinessDTO[] */
    protected array $result = [];

    public static function fromResponse(Response $response): static
    {
        $data = $response->json();
        $data['result'] = array_map(
            fn (array $item) => BusinessDTO::fromArray($item),
            $data['result'] ?? [],
        );

        return static::fromArray($data);
    }

    public function getResultCount(): int
    {
        return $this->result_count;
    }

    /**
     * Null when the listing has no further page.
     */
    public function getContinuationToken(): ?string
    {
        return $this->continuation_token;
    }

    /**
     * @return BusinessDTO[]
     */
    public function getResult(): array
    {
        return $this->result;
    }
}
