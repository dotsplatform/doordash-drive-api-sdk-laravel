<?php
/**
 * Description of DoorDashDriveException.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Exceptions;

use Dots\DoorDashDrive\Client\Responses\ErrorResponseDTO;
use Exception;
use Throwable;

class DoorDashDriveException extends Exception
{
    public function __construct(
        private readonly ErrorResponseDTO $errorResponseDTO,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getErrorResponseDTO(): ErrorResponseDTO
    {
        return $this->errorResponseDTO;
    }
}
