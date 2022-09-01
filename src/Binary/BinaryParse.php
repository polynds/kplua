<?php

namespace Kplua\Binary;

abstract class BinaryParse
{
    protected string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    protected function readBytes(int $length = 1)
    {
        $bytes = substr($this->data, 0, $length);
        $this->data = substr($this->data, $length, -1);
        return $bytes;
    }
}