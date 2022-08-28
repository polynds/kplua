<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\Utils;

class Binary
{
    public static function big_endian_unpack($format, $data)
    {
        $ar = unpack($format, $data);
        $vals = array_values($ar);
        $f = explode('/', $format);
        $i = 0;
        foreach ($f as $f_k => $f_v) {
            $repeater = intval(substr($f_v, 1));
            if ($repeater == 0) {
                $repeater = 1;
            }
            if ($f_v[1] == '*') {
                $repeater = count($ar) - $i;
            }
            if ($f_v[0] != 'd') {
                $i += $repeater;
                continue;
            }
            $j = $i + $repeater;
            for ($a = $i; $a < $j; ++$a) {
                $p = pack('d', $vals[$i]);
                $p = strrev($p);
                [$vals[$i]] = array_values(unpack('d1d', $p));
                ++$i;
            }
        }
        $a = 0;
        foreach ($ar as $ar_k => $ar_v) {
            $ar[$ar_k] = $vals[$a];
            ++$a;
        }
        return $ar;
    }

    public static function raw2hex($raw)
    {
        $m = unpack('H*', $raw);
        return $m[1];
    }

    public static function hex2raw($hex)
    {
        return pack('H*', $hex);
    }

    public static function byteStr2byteArray($s)
    {
        return array_slice(unpack('C*', "\0" . $s), 1);
    }

    public static function byteArray2byteStr(array $t)
    {
        return call_user_func_array(pack, array_merge(['C*'], $t));
    }

    public static function lsbStr2ushortArray($s)
    {
        return array_slice(unpack('v*', "\0\0" . $s), 1);
    }

    public static function ushortArray2lsbStr(array $t)
    {
        return call_user_func_array(pack, array_merge(['v*'], $t));
    }

    public static function lsbStr2ulongArray($s)
    {
        return array_slice(unpack('V*', "\0\0\0\0" . $s), 1);
    }

    public static function ulongArray2lsbStr(array $t)
    {
        return call_user_func_array(pack, array_merge(['V*'], $t));
    }

    public static function int8($i)
    {
        return is_int($i) ? pack('c', $i) : unpack('c', $i)[1];
    }

    public static function uInt8($i)
    {
        return is_int($i) ? pack('C', $i) : unpack('C', $i)[1];
    }

    public static function int16($i)
    {
        return is_int($i) ? pack('s', $i) : unpack('s', $i)[1];
    }

    public static function uInt16($i, $endianness = false)
    {
        $f = is_int($i) ? 'pack' : 'unpack';

        if ($endianness === true) {  // big-endian
            $i = $f('n', $i);
        } elseif ($endianness === false) {  // little-endian
            $i = $f('v', $i);
        } elseif ($endianness === null) {  // machine byte order
            $i = $f('S', $i);
        }

        return is_array($i) ? $i[1] : $i;
    }

    public static function int32($i)
    {
        return is_int($i) ? pack('l', $i) : unpack('l', $i)[1];
    }

    public static function uInt32($i, $endianness = false)
    {
        $f = is_int($i) ? 'pack' : 'unpack';

        if ($endianness === true) {  // big-endian
            $i = $f('N', $i);
        } elseif ($endianness === false) {  // little-endian
            $i = $f('V', $i);
        } elseif ($endianness === null) {  // machine byte order
            $i = $f('L', $i);
        }

        return is_array($i) ? $i[1] : $i;
    }

    public static function int64($i)
    {
        return is_int($i) ? pack('q', $i) : unpack('q', $i)[1];
    }

    public static function uInt64($i, $endianness = false)
    {
        $f = is_int($i) ? 'pack' : 'unpack';

        if ($endianness === true) {  // big-endian
            $i = $f('J', $i);
        } elseif ($endianness === false) {  // little-endian
            $i = $f('P', $i);
        } elseif ($endianness === null) {  // machine byte order
            $i = $f('Q', $i);
        }

        return is_array($i) ? $i[1] : $i;
    }
}
