<?php
/**
 * Description of DeliveryResponseGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Mock\Data;

class DeliveryResponseGenerator
{
    public static function generate(array $data = []): array
    {
        return array_merge([
            'external_delivery_id' => 'D-' . uniqid(),
            'delivery_status' => 'created',
            'currency' => 'USD',
            'fee' => 799,
            'tip' => 0,
            'order_value' => 1999,
            'pickup_address' => '901 Market Street 6th Floor San Francisco, CA 94103',
            'pickup_business_name' => 'Test Restaurant',
            'pickup_phone_number' => '+16505555555',
            'pickup_instructions' => '',
            'pickup_reference_tag' => '',
            'pickup_external_business_id' => '',
            'pickup_external_store_id' => '',
            'pickup_time_estimated' => now()->addMinutes(15)->toIso8601String(),
            'pickup_time_actual' => null,
            'dropoff_address' => '123 Main Street San Francisco, CA 94105',
            'dropoff_business_name' => '',
            'dropoff_phone_number' => '+16505551234',
            'dropoff_instructions' => '',
            'dropoff_contact_given_name' => 'John',
            'dropoff_contact_family_name' => 'Doe',
            'dropoff_time_estimated' => now()->addMinutes(35)->toIso8601String(),
            'dropoff_time_actual' => null,
            'contactless_dropoff' => false,
            'contains_alcohol' => false,
            'tracking_url' => 'https://tracking.doordash.com/test-' . uniqid(),
            'support_reference' => 'SR-' . uniqid(),
            'dasher_id' => null,
            'dasher_name' => null,
            'dasher_dropoff_phone_number' => null,
            'dasher_pickup_phone_number' => null,
            'dasher_location' => null,
            'updated_at' => now()->toIso8601String(),
            'created_at' => now()->toIso8601String(),
            'cancellation_reason' => null,
            'action_if_undeliverable' => null,
        ], $data);
    }
}
