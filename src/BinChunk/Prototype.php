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

    public function getSource(): string
    {
        return $this->Source;
    }

    public function setSource(string $Source): Prototype
    {
        $this->Source = $Source;
        return $this;
    }

    public function getLineDefined(): int
    {
        return $this->LineDefined;
    }

    public function setLineDefined(int $LineDefined): Prototype
    {
        $this->LineDefined = $LineDefined;
        return $this;
    }

    public function getLastLineDefined(): int
    {
        return $this->LastLineDefined;
    }

    public function setLastLineDefined(int $LastLineDefined): Prototype
    {
        $this->LastLineDefined = $LastLineDefined;
        return $this;
    }

    public function getNumParams(): int
    {
        return $this->NumParams;
    }

    public function setNumParams(int $NumParams): Prototype
    {
        $this->NumParams = $NumParams;
        return $this;
    }

    public function getIsVararg(): int
    {
        return $this->IsVararg;
    }

    public function setIsVararg(int $IsVararg): Prototype
    {
        $this->IsVararg = $IsVararg;
        return $this;
    }

    public function getMaxStackSize(): int
    {
        return $this->MaxStackSize;
    }

    public function setMaxStackSize(int $MaxStackSize): Prototype
    {
        $this->MaxStackSize = $MaxStackSize;
        return $this;
    }

    public function getCode(): array
    {
        return $this->Code;
    }

    public function setCode(array $Code): Prototype
    {
        $this->Code = $Code;
        return $this;
    }

    public function getConstants(): array
    {
        return $this->Constants;
    }

    public function setConstants(array $Constants): Prototype
    {
        $this->Constants = $Constants;
        return $this;
    }

    /**
     * @return Upvalue[]
     */
    public function getUpvalues(): array
    {
        return $this->Upvalues;
    }

    /**
     * @param Upvalue[] $Upvalues
     */
    public function setUpvalues(array $Upvalues): Prototype
    {
        $this->Upvalues = $Upvalues;
        return $this;
    }

    /**
     * @return Prototype[]
     */
    public function getProtos(): array
    {
        return $this->Protos;
    }

    /**
     * @param Prototype[] $Protos
     */
    public function setProtos(array $Protos): Prototype
    {
        $this->Protos = $Protos;
        return $this;
    }

    public function getLineInfo(): array
    {
        return $this->LineInfo;
    }

    public function setLineInfo(array $LineInfo): Prototype
    {
        $this->LineInfo = $LineInfo;
        return $this;
    }

    /**
     * @return LocVar[]
     */
    public function getLocVars(): array
    {
        return $this->LocVars;
    }

    /**
     * @param LocVar[] $LocVars
     */
    public function setLocVars(array $LocVars): Prototype
    {
        $this->LocVars = $LocVars;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getUpvalueNames(): array
    {
        return $this->UpvalueNames;
    }

    /**
     * @param string[] $UpvalueNames
     */
    public function setUpvalueNames(array $UpvalueNames): Prototype
    {
        $this->UpvalueNames = $UpvalueNames;
        return $this;
    }
}
