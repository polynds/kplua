<?php

declare(strict_types=1);
/**
 * happy coding!!!
 */
namespace Kplua\Binary;

class Writer implements Packable
{
    protected string $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }
}
