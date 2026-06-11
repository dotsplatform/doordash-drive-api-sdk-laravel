<?php

/**
 * Description of DoorDashDriveJwtGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive\Client;

use Dots\DoorDashDrive\Client\DTO\DoorDashDriveAuthDTO;

class DoorDashDriveJwtGenerator
{
    private const int TOKEN_LIFETIME_SECONDS = 1800;

    private const string ALGORITHM = 'sha256';

    private const string DD_JWT_VERSION = 'DD-JWT-V1';

    public function __construct(
        private readonly DoorDashDriveAuthDTO $authDTO,
    ) {
    }

    public function generate(): string
    {
        $header = $this->encodeHeader();
        $payload = $this->encodePayload();

        $signature = $this->sign($header, $payload);

        return $header.'.'.$payload.'.'.$signature;
    }

    private function encodeHeader(): string
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
            'dd-ver' => self::DD_JWT_VERSION,
        ];

        return $this->base64UrlEncode(json_encode($header));
    }

    private function encodePayload(): string
    {
        $now = time();

        $payload = [
            'aud' => 'doordash',
            'iss' => $this->authDTO->getDeveloperId(),
            'kid' => $this->authDTO->getKeyId(),
            'exp' => $now + self::TOKEN_LIFETIME_SECONDS,
            'iat' => $now,
        ];

        return $this->base64UrlEncode(json_encode($payload));
    }

    private function sign(string $header, string $payload): string
    {
        $data = $header.'.'.$payload;

        $decodedSecret = $this->base64UrlDecode($this->authDTO->getSigningSecret());

        $signature = hash_hmac(self::ALGORITHM, $data, $decodedSecret, true);

        return $this->base64UrlEncode($signature);
    }

    private function base64UrlEncode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function base64UrlDecode(string $data): string
    {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}
