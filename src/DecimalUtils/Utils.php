<?php
namespace Utility\DecimalUtils;

/**
 * Class Utils
 * @package Utility\DecimalUtils
 */
class Utils
{

    /**
     * 获取int的位数
     * @param int $number
     * @return int
     */
    public static function digits(int $number): int
    {
        return strlen((string)$number);
    }

    /**
     * 获取小数的位数
     * @param $number
     * @return int
     */
    public static function decimalDigits($number) :int
    {
        $string = strval($number);
        if (strpos($string, '.') !== false) {
            return strlen(substr($string, strpos($string, '.') + 1));
        } else {
            return 0;
        }
    }
}