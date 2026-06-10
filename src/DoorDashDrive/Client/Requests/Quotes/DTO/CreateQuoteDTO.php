<?php

/**
 * Description of CreateQuoteDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Quotes\DTO;

use Dots\Data\DTO;

class CreateQuoteDTO extends DTO
{
    protected string $external_delivery_id;

    protected string $pickup_address;

    protected string $dropoff_address;

    protected int $order_value;

    protected ?string $pickup_business_name;

    protected ?string $pickup_phone_number;

    protected ?string $pickup_external_business_id;

    protected ?string $pickup_external_store_id;

    protected ?string $dropoff_phone_number;

    protected ?string $dropoff_contact_given_name;

    protected ?string $dropoff_contact_family_name;

    protected ?string $pickup_time;

    protected ?string $dropoff_time;

    protected ?array $order_contains;

    public function getExternalDeliveryId(): string
    {
        return $this->external_delivery_id;
    }

    public function getPickupAddress(): string
    {
        return $this->pickup_address;
    }

    public function getDropoffAddress(): string
    {
        return $this->dropoff_address;
    }

    public function getOrderValue(): int
    {
        return $this->order_value;
    }

    public function getPickupBusinessName(): ?string
    {
        return $this->pickup_business_name;
    }

    public function getPickupPhoneNumber(): ?string
    {
        return $this->pickup_phone_number;
    }

    public function getPickupExternalBusinessId(): ?string
    {
        return $this->pickup_external_business_id;
    }

    public function getPickupExternalStoreId(): ?string
    {
        return $this->pickup_external_store_id;
    }

    public function getDropoffPhoneNumber(): ?string
    {
        return $this->dropoff_phone_number;
    }

    public function getDropoffContactGivenName(): ?string
    {
        return $this->dropoff_contact_given_name;
    }

    public function getDropoffContactFamilyName(): ?string
    {
        return $this->dropoff_contact_family_name;
    }

    public function getPickupTime(): ?string
    {
        return $this->pickup_time;
    }

    public function getDropoffTime(): ?string
    {
        return $this->dropoff_time;
    }

    public function getOrderContains(): ?array
    {
        return $this->order_contains;
    }
}
