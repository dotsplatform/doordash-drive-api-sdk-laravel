<?php

/**
 * Description of AcceptQuoteDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Quotes\DTO;

use Dots\Data\DTO;

class AcceptQuoteDTO extends DTO
{
    protected ?int $tip;

    protected ?string $dropoff_phone_number;

    protected ?int $order_value;

    protected ?string $pickup_phone_number;

    protected ?string $pickup_instructions;

    protected ?string $pickup_reference_tag;

    protected ?string $dropoff_contact_given_name;

    protected ?string $dropoff_instructions;

    protected ?bool $contactless_dropoff;

    protected ?string $action_if_undeliverable;

    protected ?array $items;

    public function getTip(): ?int
    {
        return $this->tip;
    }

    public function getDropoffPhoneNumber(): ?string
    {
        return $this->dropoff_phone_number;
    }

    public function getOrderValue(): ?int
    {
        return $this->order_value;
    }

    public function getPickupPhoneNumber(): ?string
    {
        return $this->pickup_phone_number;
    }

    public function getPickupInstructions(): ?string
    {
        return $this->pickup_instructions;
    }

    public function getPickupReferenceTag(): ?string
    {
        return $this->pickup_reference_tag;
    }

    public function getDropoffContactGivenName(): ?string
    {
        return $this->dropoff_contact_given_name;
    }

    public function getDropoffInstructions(): ?string
    {
        return $this->dropoff_instructions;
    }

    public function getContactlessDropoff(): ?bool
    {
        return $this->contactless_dropoff;
    }

    public function getActionIfUndeliverable(): ?string
    {
        return $this->action_if_undeliverable;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }
}
