<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class HeaderConstants
{
    public const LUA_SIGNATURE = '\x1bLua'; // 0x1B4C7561

    public const LUAC_VERSION = 0x53;

    public const LUAC_FORMAT = 0x00;

    public const LUAC_DATA = '\x19\x93\r\n\x1a\n'; // 0x1993 0x0D 0x1A 0x0A  0x19930D0A1A0A

    public const CINT_SIZE = 4;

    public const CSZIET_SIZE = 8;

    public const INSTRUCTION_SIZE = 4;

    public const LUA_INTEGER_SIZE = 8;

    public const LUA_NUMBER_SIZE = 8;

    public const LUAC_INT = 0x5678;

    public const LUAC_NUM = 370.5;
}
