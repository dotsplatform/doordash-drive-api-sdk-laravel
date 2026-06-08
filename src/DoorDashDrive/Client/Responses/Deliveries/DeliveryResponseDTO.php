<?php
/**
 * Description of DeliveryResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Responses\Deliveries;

use Dots\DoorDashDrive\Client\Resources\Consts\DeliveryStatus;
use Dots\DoorDashDrive\Client\Resources\DasherLocation;
use Dots\DoorDashDrive\Client\Responses\DoorDashDriveResponseDTO;

class DeliveryResponseDTO extends DoorDashDriveResponseDTO
{
    protected string $external_delivery_id;

    protected ?DeliveryStatus $delivery_status;

    protected ?string $currency;

    protected ?int $fee;

    protected ?int $tip;

    protected ?int $order_value;

    protected ?string $pickup_address;

    protected ?string $pickup_business_name;

    protected ?string $pickup_phone_number;

    protected ?string $pickup_instructions;

    protected ?string $pickup_reference_tag;

    protected ?string $pickup_external_business_id;

    protected ?string $pickup_external_store_id;

    protected ?string $pickup_time_estimated;

    protected ?string $pickup_time_actual;

    protected ?string $dropoff_address;

    protected ?string $dropoff_business_name;

    protected ?string $dropoff_phone_number;

    protected ?string $dropoff_instructions;

    protected ?string $dropoff_contact_given_name;

    protected ?string $dropoff_contact_family_name;

    protected ?string $dropoff_time_estimated;

    protected ?string $dropoff_time_actual;

    protected ?bool $contactless_dropoff;

    protected ?bool $contains_alcohol;

    protected ?string $tracking_url;

    protected ?string $support_reference;

    protected ?int $dasher_id;

    protected ?string $dasher_name;

    protected ?string $dasher_dropoff_phone_number;

    protected ?string $dasher_pickup_phone_number;

    protected ?DasherLocation $dasher_location;

    protected ?string $updated_at;

    protected ?string $created_at;

    protected ?string $cancellation_reason;

    protected ?string $action_if_undeliverable;

    public function getExternalDeliveryId(): string
    {
        return $this->external_delivery_id;
    }

    public function getDeliveryStatus(): ?DeliveryStatus
    {
        return $this->delivery_status;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getFee(): ?int
    {
        return $this->fee;
    }

    public function getTip(): ?int
    {
        return $this->tip;
    }

    public function getOrderValue(): ?int
    {
        return $this->order_value;
    }

    public function getPickupAddress(): ?string
    {
        return $this->pickup_address;
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

    public function getPickupTimeEstimated(): ?string
    {
        return $this->pickup_time_estimated;
    }

    public function getPickupTimeActual(): ?string
    {
        return $this->pickup_time_actual;
    }

    public function getDropoffAddress(): ?string
    {
        return $this->dropoff_address;
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

    public function getDropoffTimeEstimated(): ?string
    {
        return $this->dropoff_time_estimated;
    }

    public function getDropoffTimeActual(): ?string
    {
        return $this->dropoff_time_actual;
    }

    public function getContactlessDropoff(): ?bool
    {
        return $this->contactless_dropoff;
    }

    public function getContainsAlcohol(): ?bool
    {
        return $this->contains_alcohol;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->tracking_url;
    }

    public function getSupportReference(): ?string
    {
        return $this->support_reference;
    }

    public function getDasherId(): ?int
    {
        return $this->dasher_id;
    }

    public function getDasherName(): ?string
    {
        return $this->dasher_name;
    }

    public function getDasherDropoffPhoneNumber(): ?string
    {
        return $this->dasher_dropoff_phone_number;
    }

    public function getDasherPickupPhoneNumber(): ?string
    {
        return $this->dasher_pickup_phone_number;
    }

    public function getDasherLocation(): ?DasherLocation
    {
        return $this->dasher_location;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function getCancellationReason(): ?string
    {
        return $this->cancellation_reason;
    }

    public function getActionIfUndeliverable(): ?string
    {
        return $this->action_if_undeliverable;
    }
}
