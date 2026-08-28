<?php

/**
 * Description of ErrorResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Responses;

class ErrorResponseDTO extends DoorDashDriveResponseDTO
{
    private const string UNKNOWN_ERROR_MESSAGE = 'Unknown error';

    private const string UNKNOWN_FIELD_ERROR = 'invalid';

    private const string MESSAGE_PARTS_SEPARATOR = ' - ';

    private const string FIELD_ERRORS_SEPARATOR = '; ';

    protected ?string $code;

    protected ?string $message;

    protected ?array $field_errors;

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getFieldErrors(): ?array
    {
        return $this->field_errors;
    }

    /**
     * DoorDash answers a rejected payload with a generic message such as
     * "Validation Failed" and puts the actionable part in field_errors, so both are
     * combined instead of returning the message alone.
     */
    public function getMessage(): string
    {
        $parts = array_filter([
            $this->message,
            $this->formatFieldErrors(),
        ]);

        if (empty($parts)) {
            return $this->code ?? self::UNKNOWN_ERROR_MESSAGE;
        }

        return implode(self::MESSAGE_PARTS_SEPARATOR, $parts);
    }

    private function formatFieldErrors(): string
    {
        if (empty($this->field_errors)) {
            return '';
        }

        $messages = [];

        foreach ($this->field_errors as $fieldError) {
            $field = $fieldError['field'] ?? null;

            if (! $field) {
                continue;
            }

            $messages[] = $field.': '.($fieldError['error'] ?? self::UNKNOWN_FIELD_ERROR);
        }

        return implode(self::FIELD_ERRORS_SEPARATOR, $messages);
    }
}
