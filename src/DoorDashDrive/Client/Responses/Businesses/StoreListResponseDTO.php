<?php

/**
 * Description of StoreListResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Responses\Businesses;

use Dots\DoorDashDrive\Client\Resources\Business\StoreDTO;
use Dots\DoorDashDrive\Client\Responses\DoorDashDriveResponseDTO;
use Saloon\Http\Response;

class StoreListResponseDTO extends DoorDashDriveResponseDTO
{
    protected int $result_count;

    /** @var StoreDTO[] */
    protected array $result = [];

    public static function fromResponse(Response $response): static
    {
        $data = $response->json();
        $data['result'] = array_map(
            fn (array $item) => StoreDTO::fromArray($item),
            $data['result'] ?? [],
        );

        return static::fromArray($data);
    }

    public function getResultCount(): int
    {
        return $this->result_count;
    }

    /**
     * @return StoreDTO[]
     */
    public function getResult(): array
    {
        return $this->result;
    }
}
