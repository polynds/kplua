<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class Prototype
{
    protected string $Source;

    protected int $LineDefined;

    protected int $LastLineDefined;

    protected int $NumParams;

    protected int $IsVararg;

    protected int $MaxStackSize;

    protected array $Code;

    protected array $Constants;

    /**
     * @var Upvalue[]
     */
    protected array $Upvalues;

    /**
     * @var Prototype[]
     */
    protected array $Protos;

    protected array $LineInfo;

    /**
     * @var LocVar[]
     */
    protected array $LocVars;

    /**
     * @var string[]
     */
    protected array $UpvalueNames;
}
