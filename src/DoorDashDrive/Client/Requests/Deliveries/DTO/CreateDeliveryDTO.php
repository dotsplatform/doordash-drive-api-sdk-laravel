<?php

/**
 * Description of CreateDeliveryDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Requests\Deliveries\DTO;

use Dots\Data\DTO;

class CreateDeliveryDTO extends DTO
{
    protected string $external_delivery_id;

    protected string $pickup_address;

    protected string $dropoff_address;

    protected int $order_value;

    protected ?string $pickup_business_name;

    protected ?string $pickup_phone_number;

    protected ?string $pickup_instructions;

    protected ?string $pickup_reference_tag;

    protected ?string $pickup_external_business_id;

    protected ?string $pickup_external_store_id;

    protected ?string $dropoff_business_name;

    protected ?string $dropoff_phone_number;

    protected ?string $dropoff_instructions;

    protected ?string $dropoff_contact_given_name;

    protected ?string $dropoff_contact_family_name;

    protected ?bool $dropoff_contact_send_notifications;

    protected ?int $tip;

    protected ?bool $contains_alcohol;

    protected ?bool $contactless_dropoff;

    protected ?string $pickup_time;

    protected ?string $dropoff_time;

    protected ?string $action_if_undeliverable;

    protected ?array $allowed_vehicles;

    protected ?array $order_contains;

    protected ?array $items;

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

    public function getPickupInstructions(): ?string
    {
        return $this->pickup_instructions;
    }

    public function getPickupReferenceTag(): ?string
    {
        return $this->pickup_reference_tag;
    }

    public function getPickupExternalBusinessId(): ?string
    {
        return $this->pickup_external_business_id;
    }

    public function getPickupExternalStoreId(): ?string
    {
        return $this->pickup_external_store_id;
    }

    public function getDropoffBusinessName(): ?string
    {
        return $this->dropoff_business_name;
    }

    public function getDropoffPhoneNumber(): ?string
    {
        return $this->dropoff_phone_number;
    }

    public function getDropoffInstructions(): ?string
    {
        return $this->dropoff_instructions;
    }

    public function getDropoffContactGivenName(): ?string
    {
        return $this->dropoff_contact_given_name;
    }

    public function getDropoffContactFamilyName(): ?string
    {
        return $this->dropoff_contact_family_name;
    }

    public function getDropoffContactSendNotifications(): ?bool
    {
        return $this->dropoff_contact_send_notifications;
    }

    public function getTip(): ?int
    {
        return $this->tip;
    }

    public function getContainsAlcohol(): ?bool
    {
        return $this->contains_alcohol;
    }

    public function getContactlessDropoff(): ?bool
    {
        return $this->contactless_dropoff;
    }

    public function getPickupTime(): ?string
    {
        return $this->pickup_time;
    }

    public function getDropoffTime(): ?string
    {
        return $this->dropoff_time;
    }

    public function getActionIfUndeliverable(): ?string
    {
        return $this->action_if_undeliverable;
    }

    public function getAllowedVehicles(): ?array
    {
        return $this->allowed_vehicles;
    }

    public function getOrderContains(): ?array
    {
        return $this->order_contains;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }
}
