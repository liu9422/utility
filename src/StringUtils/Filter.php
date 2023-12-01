<?php
namespace Utility\StringUtils;

use Utility\Pattern\Singleton;

/**
 * Class Filter
 * @package Utility\StringUtils
 */
class Filter
{
    use Singleton;

    /**
     * 过滤字符串
     * @param string $string
     * @return string
     */
    public function filterString(string $string)
    {
        $string = preg_replace("/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU", '', $string);
        $string = preg_replace("/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU", '', $string);
        $string = preg_replace("/select\b|insert\b|update\b|delete\b|drop\b|;|\"|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dump/is", '', $string);
        $string = htmlspecialchars($string);
        $string = strip_tags($string);
        return addslashes($string);
    }

    /**
     * 将数组中的字符串进行过滤
     * @param $param
     * @return array|string
     */
    public function filterParam($param)
    {
        if(is_array($param)){
            $record = [];
            foreach ($param as $key => $value) {
                $record[$key] = $this->filterParam($value);
            }
            return $record;
        }elseif(is_string($param)){
            return $this->filterString($param);
        }else{
            return $param;
        }
    }
}