<?php

namespace App\Models\Enums;

use App\View\Objects\DropdownItem;

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

    /**
     * @return DropdownItem[]
     */
    public static function getAsDropdownItems(): array
    {
        return array_map(fn (string $fieldType) => new DropdownItem($fieldType, $fieldType), self::TYPES);
    }
}
