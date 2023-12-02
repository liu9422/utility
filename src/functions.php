<?php
# 自定义函数

use Utility\ArrayUtils\Utils as ArrayUtils;

/**************************************************** 数组相关函数 *******************************************************/
if(!function_exists('object2array')){

    /**
     * 将对象转为关联数组
     * @param $param
     * @return mixed
     */
    function object2array($param)
    {
        return ArrayUtils::toArray($param);
    }
}
if(!function_exists('array_is_index')){

    /**
     * 判断一个数组是否为索引数组
     * @param array $array
     * @return bool
     */
    function array_is_index(array $array): bool
    {
        return ArrayUtils::isIndexArray($array);
    }
}
if(!function_exists('array_reset_index')){

    /**
     * 在二维的关联数组中，将关联数组中的键来分组
     * @param array $array
     * @param string $index
     * @param false $flag
     * @return array
     */
    function array_reset_index(array $array, string $index, $flag = false):array
    {
        return ArrayUtils::resetIndex($array, $index, $flag);
    }
}
if(!function_exists('array_multi_sort')){

    /**
     * 依照二维数组中的某个键为数组排序
     * @param array $array
     * @param string $row
     * @param string $type
     * @return array
     */
    function array_multi_sort(array $array, string $row, string $type = 'ASC'):array
    {
        return ArrayUtils::multiSort($array, $row, $type);
    }
}

/**************************************************** 时间戳相关函数 *******************************************************/
use Utility\Datetime\Timestamp;

if(!function_exists('second')){

    function second(int $timestamp = null): int
    {
        return (new Timestamp($timestamp))->timestamp();
    }
}
if(!function_exists('microsecond')){

    function microsecond(int $timestamp = null): int
    {
        return (new Timestamp($timestamp))->microTimestamp();
    }
}
if(!function_exists('millisecond')){

    function millisecond(int $timestamp = null): int
    {
        return (new Timestamp($timestamp))->milliTimestamp();
    }
}
if(!function_exists('nanosecond')){

    function nanosecond(int $timestamp = null): int
    {
        return (new Timestamp($timestamp))->nanoTimestamp();
    }
}

/************************************************ 数据类型转换相关函数 ***************************************************/

use Utility\StringUtils\Json;
use Utility\StringUtils\Xml;

if(!function_exists('json2xml')){

    /**
     * JSON转化XML
     * @param string $json
     * @param string $root
     * @param string $header
     * @return string
     */
    function json2xml(string $json, string $root = 'root', string $header = '<?xml version="1.0" encoding="utf-8"?>'): string
    {
        return Xml::encode(Json::decode($json), $root, $header);
    }
}
if(!function_exists('xml2json')){

    /**
     * XML转化JSON
     * @param string $xml
     * @return string
     */
    function xml2json(string $xml): string
    {
        return Json::encode(Xml::decode($xml));
    }
}
if(!function_exists('array2xml')){

    /**
     * array转化XML
     * @param array $array
     * @param string $root
     * @param string $header
     * @return string
     */
    function array2xml(array $array, string $root = 'root', string $header = '<?xml version="1.0" encoding="utf-8"?>'): string
    {
        return Xml::encode($array, $root, $header);
    }
}
if(!function_exists('xml2array')){

    /**
     * XML转化array
     * @param string $xml
     * @return array
     */
    function xml2array(string $xml): array
    {
        return Xml::decode($xml);
    }
}
if(!function_exists('json2array')){

    /**
     * JSON转数组
     * @param string $json
     * @return array
     */
    function json2array(string $json): array
    {
        return Json::decode($json);
    }
}
if(!function_exists('array2json')){

    /**
     * 数组转JSON
     * @param array $array
     * @return string
     */
    function array2json(array $array): string
    {
        return Json::encode($array);
    }
}
if(!function_exists('is_json')){

    /**
     * 字符串是否为JSON
     * @param string $json
     * @return bool
     */
    function is_json(string $json): bool
    {
        return Json::isJson($json);
    }
}
if(!function_exists('is_xml')){

    /**
     * 字符串是否为XML
     * @param string $xml
     * @return bool
     */
    function is_xml(string $xml): bool
    {
        return Xml::isXml($xml);
    }
}

/************************************************ 浮点类型函数 ***************************************************/

use Utility\DecimalUtils\Utils as DecimalUtils;

if(!function_exists('float_digits')){

    /**
     * 浮点型变量的小数位数
     * @param float $number
     * @return int
     */
    function float_digits(float $number): int
    {
        return DecimalUtils::decimalDigits($number);
    }
}
if(!function_exists('int_digits')){

    /**
     * 整型位数
     * @param int $number
     * @return int
     */
    function int_digits(int $number): int
    {
        return DecimalUtils::digits($number);
    }
}

/************************************************ 随机字符串函数 ***************************************************/

use Utility\StringUtils\Random;

if(!function_exists('str_unique')){

    /**
     * 唯一字符串
     * @return string
     */
    function str_unique(): string
    {
        return Random::createNoRepeatString();
    }
}
if(!function_exists('str_random')){

    /**
     * 创建随机字符串
     * @param int $length
     * @param bool $flag
     * @return string
     */
    function str_random(int $length, bool $flag = false): string
    {
        return $flag ? Random::createString($length) : Random::createMatchCaseString($length);
    }
}
if(!function_exists('str_number_random')){

    /**
     * 创建随机字符串（只有数字）
     * @param int $length
     * @return string
     */
    function str_number_random(int $length): string
    {
        return Random::createNumber($length);
    }
}

/************************************************ 字符串处理相关函数 ***************************************************/

use Utility\StringUtils\Utils as StringUtils;

if(!function_exists('str_slice')){

    /**
     * 在字符串中截取一部分字符串，并返回剩下的部分
     * @param string $string
     * @param int $start
     * @param int $length
     * @return string
     */
    function str_slice(string $string, int $start, int $length): string
    {
        return StringUtils::sliceString($string, $start, $length);
    }
}
if(!function_exists('str_swap')){

    /**
     * 将一个字符串从中间切断并前后颠倒
     * @param string $string
     * @return string
     */
    function str_swap(string $string): string
    {
        return StringUtils::swapString($string);
    }
}
if(!function_exists('str_find_occurrences')){

    /**
     * 查找一个字符串在另一个字符串出现的次数和位置
     * @param string $string
     * @param string $subString
     * @return array
     */
    function str_find_occurrences(string $string, string $subString): array
    {
        return StringUtils::findOccurrences($string, $subString);
    }
}