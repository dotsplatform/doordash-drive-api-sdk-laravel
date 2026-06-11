<?php

/**
 * Description of BusinessDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources\Business;

use Dots\Data\DTO;

class BusinessDTO extends DTO
{
    protected string $external_business_id;

    protected ?string $name;

    protected ?string $description;

    protected ?bool $is_test;

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
}
