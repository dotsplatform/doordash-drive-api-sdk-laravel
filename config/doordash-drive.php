<?php

return [
    'stageEnv' => true,

    'auth' => [
        'developerId' => env('DOORDASH_DRIVE_DEVELOPER_ID'),
        'keyId' => env('DOORDASH_DRIVE_KEY_ID'),
        'signingSecret' => env('DOORDASH_DRIVE_SIGNING_SECRET'),
    ],
];
