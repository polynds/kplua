<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

use Kplua\Utils\Transform;
use Polynds\BinaryParse\Reader as BinaryReader;

class Reader
{
    protected string $data;

    protected BinaryReader $reader;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function readSignature(): string
    {
        return Transform::ascll2Str([
            $this->reader->readUInt8(),
            $this->reader->readUInt8(),
            $this->reader->readUInt8(),
            $this->reader->readUInt8(),
        ]);
    }

    public function readLuaData(): string
    {
        return Transform::ascll2Hex([
            $this->reader->readUInt8(),
            $this->reader->readUInt8(),
        ]) .
        Transform::ASCII2ControlChar([
            $this->reader->readUInt8(),
            $this->reader->readUInt8(),
        ]) .
        Transform::ascll2Str([
            $this->reader->readUInt8(),
        ]) .
        Transform::ASCII2ControlChar([
            $this->reader->readUInt8(),
        ]);
    }

    public function checkHeader()
    {
        if ($this->readSignature() != HeaderConstants::LUA_SIGNATURE) {
            panic('not a precompiled chunk!');
        }

        if ($this->reader->readUInt8() != HeaderConstants::LUAC_VERSION) {
            panic('version mismatch!');
        }

        if ($this->reader->readUInt8() != HeaderConstants::LUAC_FORMAT) {
            panic('format mismatch!');
        }

        if ($this->readLuaData() != HeaderConstants::LUAC_DATA) {
            panic('corrupted!');
        }

        if ($this->reader->readUInt8() != HeaderConstants::CINT_SIZE) {
            panic('int size mismatch!');
        }

        if ($this->reader->readUInt8() != HeaderConstants::CSZIET_SIZE) {
            panic('size_t size mismatch!');
        }

        if ($this->reader->readUInt8() != HeaderConstants::INSTRUCTION_SIZE) {
            panic('instruction size mismatch!');
        }

        if ($this->reader->readUInt8() != HeaderConstants::LUA_INTEGER_SIZE) {
            panic('lua_integer size mismatch!');
        }
        if ($this->reader->readUInt8() != HeaderConstants::LUA_NUMBER_SIZE) {
            panic('lua_number size mismatch!');
        }
        if ($this->readLuaInteger() != HeaderConstants::LUAC_INT) {
            panic('endianness size mismatch!');
        }
        if ($this->readLuaNumber() != HeaderConstants::LUAC_NUM) {
            panic('float formar mismatch!');
        }
    }

    public function readLuaInteger(): int
    {
        return $this->reader->readUInt64();
    }

    public function readLuaNumber(): float
    {
        return $this->reader->readDouble();
    }

    public function readUpvalue(): int
    {
        return $this->reader->readUInt8();
    }

    public function readString(): string
    {
        $size = $this->reader->readUInt8();
        if ($size == 0) {
            return '';
        }

        if ($size == 0xFF) {
            $size = $this->reader->readUInt64();
        }

        return $this->reader->readNULLPaddedStr($size - 1);
    }

    public function readCode(): array
    {
        $size = $this->reader->readUInt8();
        $code = [];
        while ($size-- > 0) {
            $code[] = $this->reader->readUInt32();
        }

        return $code;
    }

    public function readProto(string $parentSource = ''): Prototype
    {
        $source = $this->readString();
        if (empty($source)) {
            $source = $parentSource;
        }

        return (new Prototype())
            ->setSource($source)
            ->setLineDefined($this->reader->readUInt32())
            ->setLastLineDefined($this->reader->readUInt32())
            ->setNumParams($this->reader->readUInt8())
            ->setIsVararg($this->reader->readUInt8())
            ->setMaxStackSize($this->reader->readUInt8())
            ->setCode($this->readCode());
    }
}
