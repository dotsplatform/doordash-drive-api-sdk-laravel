<?php
/**
 * Description of ErrorResponseDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client\Responses;

class ErrorResponseDTO extends DoorDashDriveResponseDTO
{
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

    public function getMessage(): string
    {
        if ($this->message) {
            return $this->message;
        }

        if (! empty($this->field_errors)) {
            return $this->formatFieldErrors($this->field_errors);
        }

        return $this->code ?? 'Unknown error';
    }

    private function formatFieldErrors(array $fieldErrors): string
    {
        $messages = array_filter(
            array_map(fn (array $error) => $error['field'] . ': ' . ($error['error'] ?? 'invalid'), $fieldErrors),
        );

        if (empty($messages)) {
            return 'Validation failed';
        }

        return implode('; ', $messages);
    }
}
