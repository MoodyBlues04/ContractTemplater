<?php

namespace App\Models\Helpers;

class FieldTypes
{
    public const INT = 'int';
    public const STRING = 'string';
    public const DATE = 'date';
    public const DATETIME = 'datetime';

    public const TYPES = [
        self::INT,
        self::STRING,
        self::DATE,
        self::DATETIME,
    ];
}
