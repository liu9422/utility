<?php
namespace Utility\ArrayUtils;

class Utils
{
    public static function toArray($object)
    {
        return json_decode(json_encode($object), true);
    }

    public static function resetIndex(array $array, $index, $flag = false)
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
}