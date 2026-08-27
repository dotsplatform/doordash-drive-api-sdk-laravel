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
    private const int HTTP_NOT_FOUND = 404;

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

    /**
     * The exception code carries the HTTP status returned by DoorDash.
     */
    public function isNotFound(): bool
    {
        return $this->getCode() === self::HTTP_NOT_FOUND;
    }
}
