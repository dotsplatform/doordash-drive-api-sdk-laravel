<?php

/**
 * Description of BusinessExternalMetadataDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Business;

use Dots\Data\DTO;

class BusinessExternalMetadataDTO extends DTO
{
    protected ?string $number_of_stores;

    protected ?string $client_email;

    protected ?string $client_phone_number;

    /** @var string[] */
    protected array $external_store_ids = [];

    public function getNumberOfStores(): ?string
    {
        return $this->number_of_stores;
    }

    public function getClientEmail(): ?string
    {
        return $this->client_email;
    }

    public function getClientPhoneNumber(): ?string
    {
        return $this->client_phone_number;
    }

    /**
     * @return string[]
     */
    public function getExternalStoreIds(): array
    {
        return $this->external_store_ids;
    }
}
