<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

class Reader implements Unpackable
{
    protected string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function readInt8()
    {
        return self::unpack('c', $this->readBytes());
    }

    public function readUInt8()
    {
        return self::unpack('C', $this->readBytes());
    }

    public function readInt16()
    {
        return self::unpack('s', $this->readBytes());
    }

    public function readUInt16($endianness = false)
    {
        if($endianness){

        }else{

        }

        return self::unpack('S', $this->readBytes());
    }

    public function readLowHexString()
    {
        return self::unpack('h', $this->readBytes());
    }

    public function readHighHexString()
    {
        return self::unpack('H', $this->readBytes());
    }

    protected function readBytes(int $length = 1)
    {
        $bytes = substr($this->data, 0, $length);
        $this->data = substr($this->data, $length, -1);
        return $bytes;
    }

    protected static function unpack(string $format, string $string, int $offset = 0)
    {
        $data = unpack($format, $string, $offset);
        return is_array($data) ? $data[1] : $data;
    }
}
