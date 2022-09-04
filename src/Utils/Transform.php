<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\Utils;

use InvalidArgumentException;

class Transform
{
    /**
     * @param int[] $data 每个元素都是0-128以内的数字
     *                    一些不可见字符将以十六进制展示
     */
    public static function ascll2Str(array $data): string
    {
        $str = '';
        foreach ($data as $byte) {
            if ($byte < 0 || $byte > 128) {
                throw new InvalidArgumentException('invalid ascll code.');
            }
            if ($byte >= 33 && $byte <= 126) {
                $str .= chr($byte);
            } else {
                $str .= sprintf('\\x%x', $byte);
            }
        }
        return $str;
    }

    /**
     * 转换ASCII码控制字符部分到字面量字符串.
     */
    public static function ASCII2ControlChar(array $data): string
    {
        $str = '';
        foreach ($data as $byte) {
            if ($byte < 0 || ($byte > 32 && $byte != 127)) {
                throw new InvalidArgumentException('invalid ascll code.');
            }
            $str .= ControlCharacters::map($byte);
        }
        return $str;
    }

    public static function ascll2Hex(array $data): string
    {
        $str = '';
        foreach ($data as $byte) {
            $str .= sprintf('\\x%x', $byte);
        }
        return $str;
    }

    public static function hex2bin2($h)
    {
        if (! is_string($h)) {
            return null;
        }
        $r = '';
        for ($i = 0; $i < strlen($h); $i += 2) {
            $hex = ($i == 0 ? '\\x' : '') . $h[$i] . $h[($i + 1)];
//        var_dump($hex, ord($hex));
            if ($hex >= 0x21 && $hex <= 0x7E) {
                $r .= chr(hexdec($hex));
            } else {
                $r .= $hex;
            }
        }
        return $r;
    }
}
