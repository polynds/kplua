<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\BinChunk;

class Reader
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function checkHeader()
    {
    }

    public function readByte()
    {



    }

    public function readProto(string $string): Prototype
    {

    }



}
