<?php

namespace App\Models\Enums;

class SubscriptionStatus
{
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_ACTIVE = 'active';

    public const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
    ];
}
