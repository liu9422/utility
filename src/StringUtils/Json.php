<?php
namespace Utility\StringUtils;

/**
 * Class Json
 * @package Utility\StringUtils
 */
class Json
{
    /**
     * @param $data
     * @return string
     */
    public static function encode($data): string
    {
        return json_encode($data, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param string $json
     * @return array
     */
    public static function decode(string $json): array
    {
        return json_decode($json, true);
    }

    /**
     * 判断一个字符串势头为JSON
     * @param string $json
     * @return bool
     */
    public static function isJson(string $json): bool
    {
        return !is_null(json_decode($json));
    }
}