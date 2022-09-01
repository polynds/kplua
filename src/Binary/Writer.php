<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

class Writer extends BinaryParse implements Packable
{
    public function __construct(string $data)
    {
        parent::__construct($data);
    }

    public function writeInt8()
    {
        // TODO: Implement writeInt8() method.
    }

    public function writeUInt8()
    {
        // TODO: Implement writeUInt8() method.
    }

    public function writeInt16()
    {
        // TODO: Implement writeInt16() method.
    }

    public function writeUInt16(?ByteOrder $byteOrder = null)
    {
        // TODO: Implement writeUInt16() method.
    }

    public function writeInt64()
    {
        // TODO: Implement writeInt64() method.
    }

    public function writeUInt64(?ByteOrder $byteOrder = null)
    {
        // TODO: Implement writeUInt64() method.
    }

    public function writeInt32()
    {
        // TODO: Implement writeInt32() method.
    }

    public function writeUInt32(?ByteOrder $byteOrder = null)
    {
        // TODO: Implement writeUInt32() method.
    }

    public function writeLowHexStr(int $bit)
    {
        // TODO: Implement writeLowHexStr() method.
    }

    public function writeHighHexStr(int $bit)
    {
        // TODO: Implement writeHighHexStr() method.
    }

    public function writeFloat(?ByteOrder $byteOrder = null)
    {
        // TODO: Implement writeFloat() method.
    }

    public function writeDouble(?ByteOrder $byteOrder = null)
    {
        // TODO: Implement writeDouble() method.
    }

    public function writeSpacePaddedStr(int $length): string
    {
        // TODO: Implement writeSpacePaddedStr() method.
        return '';
    }

    public function writeNULLPaddedStr(int $length): string
    {
        // TODO: Implement writeNULLPaddedStr() method.
        return '';
    }
}
