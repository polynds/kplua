<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class HeaderConstants
{
    public const LUA_SIGNATURE = '\x1bLua';

    public const LUAC_VERSION = 0x53;

    public const LUAC_FORMAT = 0;

    public const LUAC_DATA = '\x19\x93\r\n\x1a\n';

    public const CINT_SIZE = 4;

    public const CSZIET_SIZE = 8;

    public const INSTRUCTION_SIZE = 4;

    public const LUA_INTEGER_SIZE = 8;

    public const LUA_NUMBER_SIZE = 8;

    public const LUAC_INT = 0x5678;

    public const LUAC_NUM = 370.5;
}
