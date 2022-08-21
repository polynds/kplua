<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class Header
{
    protected string $signature; //[4]byte

    protected int $version; //byte

    protected int $format; //byte

    protected string $luacData; //[6]byte

    protected int $cintSize; //byte

    protected int $sizetSize; //byte

    protected int $instructionSize; //byte

    protected int $luaIntergerSize; //byte

    protected int $luaNumberSize; //byte

    protected int $luacInt; //int64

    protected float $luacNum; //float64
}
