<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\Utils;

class Platform
{
    /**
     * 是否为大端序.
     */
    public static function bigEndian(): bool
    {
        $data = 0x1200;
        $bytes = pack('s', $data);
        return ord($bytes[0]) === 0x12;
    }
}
