<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

interface Unpackable
{
    public function readInt8();

    public function readUInt8();

    public function readInt16();

    public function readUInt16(?ByteOrder $byteOrder = null);

    public function readInt64();

    public function readUInt64(?ByteOrder $byteOrder = null);

    public function readInt32();

    public function readUInt32(?ByteOrder $byteOrder = null);

    public function readLowHexStr(int $bit);

    public function readHighHexStr(int $bit);

    public function readFloat(?ByteOrder $byteOrder = null);

    public function readDouble(?ByteOrder $byteOrder = null);

    /**
     * 以空格结尾的字符串.
     */
    public function readSpacePaddedStr(int $length): string;

    /**
     * 以\0结尾的字符串.
     */
    public function readNULLPaddedStr(int $length): string;
}
