<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class BinaryChunk
{
    /**
     * 头部.
     */
    protected $header;

    /**
     * 主函数upvalue的数量.
     */
    protected int $sizeUpvalues;

    /**
     * 主函数原型.
     */
    protected $mainFunc;

    public function undump($data): Prototype
    {
        $reader = (new Reader($data));
        $reader->checkHeader();
        $reader->readByte();
        return $reader->readProto('');
    }


}
