<?php
namespace Utility\ArrayUtils;

use BadFunctionCallException;

/**
 * 数组相关工具方法
 * Class Utils
 * @package Utility\ArrayUtils
 */
class Utils
{
    /**
     * 将对象转为关联数组
     * @param $object
     * @return mixed
     */
    public static function toArray($object)
    {
        return json_decode(json_encode($object), true);
    }

    /**
     * 在二维的关联数组中，将关联数组中的键来分组
     * @param array $array
     * @param string $index
     * @param false $flag
     * @return array|false
     */
    public static function resetIndex(array $array, string $index, $flag = false)
    {
        $result = [];
        foreach ($array as $item){
            if(!isset($item[$index])){
                return false;
            }
            if($flag){
                if(!isset($result[$item[$index]]) || empty($result[$item[$index]])){
                    $result[$item[$index]] = [];
                }
                array_push($result[$item[$index]], $item);
            }else{
                $result[$item[$index]] = $item;
            }
        }
        return $result;
    }

    /**
     * 判断一个数组是否为索引数组
     * @param array $array
     * @return bool
     */
    public static function isIndexArray(array $array): bool
    {
        return count(array_filter(array_keys($array), 'is_string')) === 0;
    }

    /**
     * 依照二维数组中的某个键为数组排序
     * @param array $array
     * @param string $row
     * @param string $type
     * @return array
     */
    public static function multiSort(array $array, string $row, string $type = 'ASC'): array
    {
        $sortFields = array_column($array, $row);
        $type = strtoupper($type);
        switch ($type) {
            case 'ASC':
                array_multisort($sortFields, SORT_ASC, $array);
                break;
            case 'DESC':
                array_multisort($sortFields,SORT_DESC, $array);
                break;
            default:
                throw new BadFunctionCallException('error sort type ' . $type);
        }
        return $array;
    }
}