<?php

namespace App\Modules\Api\YandexCloudApi;

class YandexVisionModels
{
    public const PASSPORT = 'passport';
    public const DRIVER_LICENSE_FRONT = 'driver-license-front';
    public const DRIVER_LICENSE_BACK = 'driver-license-back';
    public const VEHICLE_REGISTRATION_FRONT = 'vehicle-registration-front';
    public const VEHICLE_REGISTRATION_BACK = 'vehicle-registration-back';
    public const LICENSE_PLATES = 'license-plates';

    public const MODELS = [
        self::PASSPORT,
        self::DRIVER_LICENSE_FRONT,
        self::DRIVER_LICENSE_BACK,
        self::VEHICLE_REGISTRATION_FRONT,
        self::VEHICLE_REGISTRATION_BACK,
        self::LICENSE_PLATES,
    ];

    /**
     * @throws \Exception
     */
    public static function validate(string $model): void
    {
        if (!self::isValid($model)) {
            throw new \Exception("Not a valid yandex vision model: {$model}");
        }
    }

    public static function isValid(string $model): bool
    {
        return in_array($model, self::MODELS);
    }
}
