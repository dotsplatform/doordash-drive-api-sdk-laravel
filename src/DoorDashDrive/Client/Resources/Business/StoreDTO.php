<?php

/**
 * Description of StoreDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Business;

use Dots\Data\DTO;
use Dots\DoorDashDrive\Client\Resources\Consts\StoreActivationStatus;

class StoreDTO extends DTO
{
    protected string $external_store_id;

    protected string $external_business_id;

    protected ?string $name;

    protected ?string $phone_number;

    protected ?string $address;

    /**
     * Kept as a raw string so that a status DoorDash adds later cannot break parsing
     * of an otherwise valid response.
     */
    protected ?string $status;

    protected ?bool $is_test;

    protected ?string $created_at;

    protected ?string $last_updated_at;

    public function getExternalStoreId(): string
    {
        return $this->external_store_id;
    }

    public function getExternalBusinessId(): string
    {
        return $this->external_business_id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function isActive(): bool
    {
        return $this->status === StoreActivationStatus::ACTIVE->value;
    }

    public function isTest(): ?bool
    {
        return $this->is_test;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function getLastUpdatedAt(): ?string
    {
        return $this->last_updated_at;
    }
}
