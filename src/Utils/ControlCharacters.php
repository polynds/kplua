<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\Utils;

class ControlCharacters
{
    protected const MAP = [
        0x00 => '',
        0 => '',

        0x0A => '\n',
        10 => '\n',

        0x0D => '\r',
        13 => '\r',
    ];

    public static function map($code): string
    {
        return self::MAP[$code] ?? '';
    }
}
