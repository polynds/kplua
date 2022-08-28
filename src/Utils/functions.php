<?php

declare(strict_types=1);
/**
 * happy coding.
 */
use Kplua\Exception\KPLuaException;

if (! function_exists('panic')) {
    function panic(string $message = '')
    {
        throw new KPLuaException($message);
    }
}
