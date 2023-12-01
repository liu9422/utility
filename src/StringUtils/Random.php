<?php
namespace Utility\StringUtils;

/**
 * Class Random
 * @package Utility\StringUtils
 */
class Random
{
    /**
     * 创建随机长度字符串
     * @param int $length
     * @return bool|string
     */
    public static function createString(int $length = 10)
    {
        return substr(str_shuffle(str_repeat('1234567890ABCDEFGHJKMNOPQRSTUVWXYZ', $length)), 0, $length);
    }

    /**
     * 创建随机长度数字字符串
     * @param int $length
     * @return bool|string
     */
    public static function createNumber(int $length = 10)
    {
        return substr(str_shuffle(str_repeat('1234567890', $length)), 0, $length);
    }

    /**
     * 创建不重复的字符串
     * @return string
     */
    public static function createNoRepeatString()
    {
        return md5(uniqid(md5(microtime(true)),true));
    }
}