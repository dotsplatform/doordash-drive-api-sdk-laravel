<?php
/**
 * Description of DasherLocation.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Resources;

use Dots\Data\DTO;

class DasherLocation extends DTO
{
    protected ?float $lat;

    protected ?float $lng;

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }
}
