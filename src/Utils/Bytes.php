<?php

declare(strict_types=1);
/**
 * happy coding.
 */
namespace Kplua\Utils;

class Bytes
{
    /**
     * 转换一个string字符串为byte数组.
     * @param $str //需要转换的字符串
     * @param $bytes //目标byte数组
     */
    public static function getBytes($str): array
    {
        $len = strlen($str);
        $bytes = [];

        for ($i = 0; $i < $len; ++$i) {
            if (ord($str[$i]) >= 128) {
                $byte = ord($str[$i]) - 256;
            } else {
                $byte = ord($str[$i]);
            }

            $bytes[] = $byte;
        }

        return $bytes;
    }

    /**
     * 将字节数组转化为string类型的数据.
     * @param $bytes //字节数组
     * @param $str //目标字符串
     * @return //一个string类型的数据
     */
    public static function toStr($bytes): string
    {
        $str = '';
        foreach ($bytes as $ch) {
            $str .= chr($ch);
        }

        return $str;
    }

    /**
     * 转换一个int为byte数组.
     * @param $byt //目标byte数组
     * @param $val //需要转换的字符串
     */
    public static function integerToBytes($val): array
    {
        $byt = [];
        $byt[0] = ($val & 0xFF);
        $byt[1] = ($val >> 8 & 0xFF);
        $byt[2] = ($val >> 16 & 0xFF);
        $byt[3] = ($val >> 24 & 0xFF);
        return $byt;
    }

    /**
     * 从字节数组中指定的位置读取一个integer类型的数据.
     * @param $bytes //字节数组
     * @param $position //指定的开始位置
     * @return //一个integer类型的数据
     */
    public static function bytesToInteger($bytes, $position): int
    {
        $val = 0;
        $val = $bytes[$position + 3] & 0xFF;
        $val <<= 8;
        $val |= $bytes[$position + 2] & 0xFF;
        $val <<= 8;
        $val |= $bytes[$position + 1] & 0xFF;
        $val <<= 8;
        $val |= $bytes[$position] & 0xFF;
        return $val;
    }

    /**
     * 转换一个shor字符串为byte数组.
     * @param $byt //目标byte数组
     * @param $val //需要转换的字符串
     */
    public static function shortToBytes($val): array
    {
        $byt = [];
        $byt[0] = ($val & 0xFF);
        $byt[1] = ($val >> 8 & 0xFF);
        return $byt;
    }

    /**
     * 从字节数组中指定的位置读取一个short类型的数据。
     * @param $bytes //字节数组
     * @param $position //指定的开始位置
     * @return //一个short类型的数据
     */
    public static function bytesToShort($bytes, $position): int
    {
        $val = 0;
        $val = $bytes[$position + 1] & 0xFF;
        $val = $val << 8;
        $val |= $bytes[$position] & 0xFF;
        return $val;
    }
}
