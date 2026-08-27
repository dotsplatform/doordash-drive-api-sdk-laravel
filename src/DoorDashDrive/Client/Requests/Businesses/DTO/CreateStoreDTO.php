<?php

/**
 * Description of CreateStoreDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses\DTO;

use Dots\Data\DTO;

class CreateStoreDTO extends DTO
{
    protected string $external_store_id;

    protected string $name;

    protected string $address;

    protected ?string $phone_number;

    public function getExternalStoreId(): string
    {
        return $this->external_store_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }
}
