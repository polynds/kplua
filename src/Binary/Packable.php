<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

interface Packable
{
    public function writeInt8();

    public function writeUInt8();

    public function writeInt16();

    public function writeUInt16(?ByteOrder $byteOrder = null);

    public function writeInt64();

    public function writeUInt64(?ByteOrder $byteOrder = null);

    public function writeInt32();

    public function writeUInt32(?ByteOrder $byteOrder = null);

    public function writeLowHexStr(int $bit);

    public function writeHighHexStr(int $bit);

    public function writeFloat(?ByteOrder $byteOrder = null);

    public function writeDouble(?ByteOrder $byteOrder = null);

    /**
     * 以空格结尾的字符串.
     */
    public function writeSpacePaddedStr(int $length): string;

    /**
     * 以\0结尾的字符串.
     */
    public function writeNULLPaddedStr(int $length): string;
}
