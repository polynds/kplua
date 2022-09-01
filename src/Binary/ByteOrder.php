<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

class ByteOrder
{
    public const BIG_ENDIAN = 'big_endian'; // 大端序(网络字节序)

    public const LITTLE_ENDIAN = 'little_endian'; // 小端序

    protected string $order;

    public function __construct(string $order = null)
    {
        $this->order = is_null($order) ? self::checkOrder() : $order;
    }

    public function getOrder(): string
    {
        return $this->order;
    }

    public function isBigEndian(): bool
    {
        return (bool) ($this->order & self::BIG_ENDIAN);
    }

    public function isLittleEndian(): bool
    {
        return (bool) ($this->order & self::LITTLE_ENDIAN);
    }

    public static function checkOrder(): string
    {
        $data = 0x1200;
        $bytes = pack('s', $data);
        $bigEndian = ord($bytes[0]) === 0x12; // 是否为大端序
        return $bigEndian ? self::BIG_ENDIAN : self::LITTLE_ENDIAN;
    }
}
