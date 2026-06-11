<?php

/**
 * Description of DoorDashDriveServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\DoorDashDrive;

use Dots\DoorDashDrive\Client\DoorDashDriveConnector;
use Dots\DoorDashDrive\Client\DTO\DoorDashDriveAuthDTO;
use Dots\DoorDashDrive\Commands\CancelDeliveryDoorDashDriveCommand;
use Dots\DoorDashDrive\Commands\CreateDeliveryDoorDashDriveCommand;
use Dots\DoorDashDrive\Commands\GetDeliveryDoorDashDriveCommand;
use Illuminate\Support\ServiceProvider;

class DoorDashDriveServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/doordash-drive.php' => config_path('doordash-drive.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->registerArtisanCommands();
        }

        $this->app->bind(DoorDashDriveConnector::class, function () {
            return new DoorDashDriveConnector(
                DoorDashDriveAuthDTO::fromArray([
                    'developerId' => config('doordash-drive.auth.developerId'),
                    'keyId' => config('doordash-drive.auth.keyId'),
                    'signingSecret' => config('doordash-drive.auth.signingSecret'),
                ]),
            );
        });
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/doordash-drive.php',
            'doordash-drive',
        );
    }

    protected function registerArtisanCommands(): void
    {
        $this->commands([
            CreateDeliveryDoorDashDriveCommand::class,
            GetDeliveryDoorDashDriveCommand::class,
            CancelDeliveryDoorDashDriveCommand::class,
        ]);
    }
}
