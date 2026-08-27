<?php

/**
 * Description of UpdateStoreDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses\DTO;

use Dots\Data\DTO;

class UpdateStoreDTO extends DTO
{
    protected ?string $name;

    protected ?string $address;

    protected ?string $phone_number;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }
}
