<?php
/**
 * Description of DoorDashDriveAuthDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\DTO;

use Dots\Data\DTO;

class DoorDashDriveAuthDTO extends DTO
{
    protected string $developerId;

    protected string $keyId;

    protected string $signingSecret;

    public static function make(
        string $developerId,
        string $keyId,
        string $signingSecret,
    ): self {
        return self::fromArray([
            'developerId' => $developerId,
            'keyId' => $keyId,
            'signingSecret' => $signingSecret,
        ]);
    }

    public function getDeveloperId(): string
    {
        return $this->developerId;
    }

    public function getKeyId(): string
    {
        return $this->keyId;
    }

    public function getSigningSecret(): string
    {
        return $this->signingSecret;
    }
}
