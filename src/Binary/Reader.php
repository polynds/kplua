<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

class Reader extends BinaryParse implements Unpackable
{
    public function __construct(string $data)
    {
        parent::__construct($data);
    }

    public function readInt8()
    {
        return self::unpack('c', $this->readBytes(8));
    }

    public function readUInt8()
    {
        return self::unpack('C', $this->readBytes(8));
    }

    public function readInt16()
    {
        return self::unpack('s', $this->readBytes(16));
    }

    public function readUInt16(?ByteOrder $byteOrder = null)
    {
        $bytes = $this->readBytes(16);
        if ($byteOrder->isBigEndian()) {
            $format = 'n';
        } elseif ($byteOrder->isLittleEndian()) {
            $format = 'v';
        } else {
            $format = 'S';
        }

        return self::unpack($format, $bytes);
    }

    public function readInt64()
    {
        return self::unpack('q', $this->readBytes(64));
    }

    public function readUInt64(?ByteOrder $byteOrder = null)
    {
        $bytes = $this->readBytes(64);
        if ($byteOrder->isBigEndian()) {
            $format = 'J';
        } elseif ($byteOrder->isLittleEndian()) {
            $format = 'P';
        } else {
            $format = 'Q';
        }

        return self::unpack($format, $bytes);
    }

    public function readInt32()
    {
        return self::unpack('l', $this->readBytes(32));
    }

    public function readUInt32(?ByteOrder $byteOrder = null)
    {
        $bytes = $this->readBytes(32);
        if ($byteOrder->isBigEndian()) {
            $format = 'N';
        } elseif ($byteOrder->isLittleEndian()) {
            $format = 'V';
        } else {
            $format = 'L';
        }

        return self::unpack($format, $bytes);
    }

    public function readLowHexStr(int $bit)
    {
        if ($bit % 4 != 0) {
            throw IncorrectParamException::create('the parameter bit is not a multiple of 4.');
        }
        $length = $bit / 4;
        return self::unpack('h' . $length, $this->readBytes($bit));
    }

    public function readHighHexStr(int $bit)
    {
        if ($bit % 4 != 0) {
            throw IncorrectParamException::create('the parameter bit is not a multiple of 4.');
        }
        $length = $bit / 4;
        return self::unpack('H' . $length, $this->readBytes($bit));
    }

    public function readFloat(?ByteOrder $byteOrder = null)
    {
        $bytes = $this->readBytes(32);
        if ($byteOrder->isBigEndian()) {
            $format = 'G';
        } elseif ($byteOrder->isLittleEndian()) {
            $format = 'g';
        } else {
            $format = 'f';
        }

        return self::unpack($format, $bytes);
    }

    public function readDouble(?ByteOrder $byteOrder = null)
    {
        $bytes = $this->readBytes(64);
        if ($byteOrder->isBigEndian()) {
            $format = 'E';
        } elseif ($byteOrder->isLittleEndian()) {
            $format = 'e';
        } else {
            $format = 'd';
        }

        return self::unpack($format, $bytes);
    }

    /**
     * 以空格结尾的字符串.
     */
    public function readSpacePaddedStr(int $length): string
    {
        return (string) self::unpack('a*', $this->readBytes($length));
    }

    /**
     * 以\0结尾的字符串.
     */
    public function readNULLPaddedStr(int $length): string
    {
        return (string) self::unpack('A*', $this->readBytes($length));
    }

    protected static function unpack(string $format, string $string, int $offset = 0)
    {
        $data = unpack($format, $string, $offset);
        return is_array($data) ? $data[1] : $data;
    }
}
