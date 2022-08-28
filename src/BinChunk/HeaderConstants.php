<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class HeaderConstants
{
    public const LUA_SIGNATURE = 0x1B4C7561;//'\x1bLua'

    public const LUAC_VERSION = 0x54;

    public const LUAC_FORMAT = 0x00;

    public const LUAC_DATA = 0x19930D0A1A0A; // 0x1993 0x0D 0x1A 0x0A

    public const CINT_SIZE = 4;

    public const CSZIET_SIZE = 8;

    public const INSTRUCTION_SIZE = 4;

    public const LUA_INTEGER_SIZE = 8;

    public const LUA_NUMBER_SIZE = 8;

    public const LUAC_INT_BIG_ENDIAN = 0x5678; // 大端，高字节在低位置

    public const LUAC_INT_SMALL_ENDIAN = 0x7856; // 小端，低字节在高位置

    public const LUAC_NUM = 370.5;
}
