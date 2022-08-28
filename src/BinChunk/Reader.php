<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class Reader
{
    protected string $data;

    protected int $byte = 0;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function checkHeader()
    {
        if ($this->readBytes(4) != HeaderConstants::LUA_SIGNATURE) {
            panic('not a precompiled chunk!');
        }

        if ($this->readByte() != HeaderConstants::LUAC_VERSION) {
            panic('version mismatch!');
        }

        if ($this->readByte() != HeaderConstants::LUAC_FORMAT) {
            panic('format mismatch!');
        }

        if ($this->readBytes(6) != HeaderConstants::LUAC_DATA) {
            panic('corrupted!');
        }

        if ($this->readByte() != HeaderConstants::CINT_SIZE) {
            panic('int size mismatch!');
        }

        if ($this->readByte() != HeaderConstants::CSZIET_SIZE) {
            panic('size_t size mismatch!');
        }

        if ($this->readByte() != HeaderConstants::INSTRUCTION_SIZE) {
            panic('instruction size mismatch!');
        }

        if ($this->readByte() != HeaderConstants::LUA_INTEGER_SIZE) {
            panic('lua_integer size mismatch!');
        }
        if ($this->readByte() != HeaderConstants::LUA_NUMBER_SIZE) {
            panic('lua_number size mismatch!');
        }
        if ($this->readLuaInteger() != HeaderConstants::LUAC_INT_SMALL_ENDIAN) {
            panic('endianness size mismatch!');
        }
        if ($this->readLuaNumber() != HeaderConstants::LUAC_NUM) {
            panic('float formar mismatch!');
        }
    }

    public function readByte()
    {
        $b = unpack('H1', $this->data, $this->byte);
        $this->byte += 2;
        return $b;
    }

    public function readUint32()
    {
        $b = unpack('V4', $this->data, $this->byte);
        $this->byte += 4;
        return $b;
    }

    public function readUint64()
    {
        $b = unpack('P8', $this->data, $this->byte);
        $this->byte += 8;
        return $b;
    }

    public function readLuaInteger()
    {
        return (int) $this->readUint64();
    }

    public function readLuaNumber()
    {
        return (float) $this->readUint64();
    }

    public function readString()
    {
        $size = $this->readByte();
        if ($size == 0) {
            return '';
        }
        if ($size == 0xFF) {
            $size = $this->readUint64();
        }

        return $this->readBytes($size - 1);
    }

    public function readBytes(int $size)
    {
        $byte = $size * 2;
        $b = unpack("H{$byte}", $this->data, $this->byte);
        $this->byte += $size;
        return $b;
    }

    public function readProto(string $string): Prototype
    {
    }
}
