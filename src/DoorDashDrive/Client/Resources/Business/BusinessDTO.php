<?php

/**
 * Description of BusinessDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Business;

use Dots\Data\DTO;
use Dots\DoorDashDrive\Client\Resources\Consts\BusinessActivationStatus;

class BusinessDTO extends DTO
{
    protected string $external_business_id;

    protected ?string $name;

    protected ?string $description;

    protected ?bool $is_test;

    /**
     * Kept as a raw string so that a status DoorDash adds later cannot break parsing
     * of an otherwise valid response.
     */
    protected ?string $activation_status;

    protected ?string $created_at;

    protected ?string $last_updated_at;

    protected ?BusinessExternalMetadataDTO $external_metadata;

    public function getExternalBusinessId(): string
    {
        return $this->external_business_id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function isTest(): ?bool
    {
        return $this->is_test;
    }

    public function getActivationStatus(): ?string
    {
        return $this->activation_status;
    }

    public function isActive(): bool
    {
        return $this->activation_status === BusinessActivationStatus::ACTIVE->value;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function getLastUpdatedAt(): ?string
    {
        return $this->last_updated_at;
    }

    public function getExternalMetadata(): ?BusinessExternalMetadataDTO
    {
        return $this->external_metadata;
    }
}
