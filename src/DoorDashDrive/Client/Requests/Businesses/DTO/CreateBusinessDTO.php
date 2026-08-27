<?php

/**
 * Description of CreateBusinessDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Businesses\DTO;

use Dots\Data\DTO;
use Dots\DoorDashDrive\Client\Resources\Consts\BusinessActivationStatus;

class CreateBusinessDTO extends DTO
{
    protected string $external_business_id;

    protected string $name;

    protected ?string $description;

    protected ?BusinessActivationStatus $activation_status;

    public function getExternalBusinessId(): string
    {
        return $this->external_business_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getActivationStatus(): ?BusinessActivationStatus
    {
        return $this->activation_status;
    }
}
