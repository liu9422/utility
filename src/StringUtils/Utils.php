<?php
namespace Utility\StringUtils;

class Utils
{
    /**
     * 在字符串中截取一部分字符串，并返回剩下的部分
     * @param string $string
     * @param int $start
     * @param int $length
     * @return string
     */
    public static function sliceString(string $string, int $start, int $length): string
    {
        return substr($string, 0, $start) . substr($string, $length + $start);
    }

    /**
     * 将一个字符串从中间切断并前后颠倒
     * @param string $string
     * @return string
     */
    public static function swapString(string $string):string
    {
        $length = strlen($string);
        if ($length % 2 == 0) { // 字符串长度为偶数
            $mid = $length / 2;
            return substr($string, $mid) . substr($string, 0, $mid);
        } else { // 字符串长度为奇数
            $mid = floor($length / 2); // 向下取整
            return substr($string, $mid + 1) . substr($string, $mid, 1) . substr($string, 0, $mid);
        }
    }
}