<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class Header
{
    protected string $signature;

    protected int $version;

    protected int $format;

    protected string $luacData;

    protected int $cintSize = HeaderConstants::CINT_SIZE; //C语言整数占用字节

    protected int $sizetSize = HeaderConstants::CSZIET_SIZE; //C语言size_t类型占用字节

    protected int $instructionSize;

    protected int $luaIntergerSize; //lua整形占用字节

    protected int $luaNumberSize; //lua浮点形占用字节

    protected int $luacInt; //int

    protected float $luacNum; //float

    public function getSignature(): string
    {
        return $this->signature;
    }

    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function setVersion(int $version): void
    {
        $this->version = $version;
    }

    public function getFormat(): int
    {
        return $this->format;
    }

    public function setFormat(int $format): void
    {
        $this->format = $format;
    }

    public function getLuacData(): string
    {
        return $this->luacData;
    }

    public function setLuacData(string $luacData): void
    {
        $this->luacData = $luacData;
    }

    public function getInstructionSize(): int
    {
        return $this->instructionSize;
    }

    public function setInstructionSize(int $instructionSize): void
    {
        $this->instructionSize = $instructionSize;
    }

    public function getLuaIntergerSize(): int
    {
        return $this->luaIntergerSize;
    }

    public function setLuaIntergerSize(int $luaIntergerSize): void
    {
        $this->luaIntergerSize = $luaIntergerSize;
    }

    public function getLuaNumberSize(): int
    {
        return $this->luaNumberSize;
    }

    public function setLuaNumberSize(int $luaNumberSize): void
    {
        $this->luaNumberSize = $luaNumberSize;
    }

    public function getLuacInt(): int
    {
        return $this->luacInt;
    }

    public function setLuacInt(int $luacInt): void
    {
        $this->luacInt = $luacInt;
    }

    public function getLuacNum(): float
    {
        return $this->luacNum;
    }

    public function setLuacNum(float $luacNum): void
    {
        $this->luacNum = $luacNum;
    }

    public function getCintSize(): int
    {
        return $this->cintSize;
    }

    public function getSizetSize(): int
    {
        return $this->sizetSize;
    }

    public function toArray(): array
    {
        return [
            'signature' => $this->getSignature(),
            'version' => $this->getVersion(),
            'format' => $this->getFormat(),
            'luacData' => $this->getLuacData(),
            'cintSize' => $this->getCintSize(),
            'sizetSize' => $this->getSizetSize(),
            'instructionSize' => $this->getInstructionSize(),
            'luaIntergerSize' => $this->getLuaIntergerSize(),
            'luaNumberSize' => $this->getLuaNumberSize(),
            'luacInt' => $this->getLuacInt(),
            'luacNum' => $this->getLuacNum(),
        ];
    }
}
