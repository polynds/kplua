<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\Utils;

class Str
{
    public static function left($str, $length)
    {
        return substr($str, 0, $length);
    }

    public static function right($str, $length)
    {
        return substr($str, -$length);
    }

    public static function after($str, $inthat)
    {
        if (! is_bool(strpos($inthat, $str))) {
            return substr($inthat, strpos($inthat, $str) + strlen($str));
        }
    }

    public static function after_last($str, $inthat)
    {
        if (! is_bool(self::strrevpos($inthat, $str))) {
            return substr($inthat, self::strrevpos($inthat, $str) + strlen($str));
        }
    }

    public static function before($str, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $str));
    }

    public static function before_last($str, $inthat)
    {
        return substr($inthat, 0, self::strrevpos($inthat, $str));
    }

    public static function between($str, $that, $inthat)
    {
        return self::before($that, self::after($str, $inthat));
    }

    public static function between_last($str, $that, $inthat)
    {
        return self::after_last($str, self::before_last($that, $inthat));
    }

    public static function strrevpos($instr, $needle)
    {
        $rev_pos = strpos(strrev($instr), strrev($needle));
        if ($rev_pos === false) {
            return false;
        }
        return strlen($instr) - $rev_pos - strlen($needle);
    }
}
