<?php
namespace Utility\StringUtils;

use BadFunctionCallException;
use Utility\ArrayUtils\Utils;

/**
 * Class Xml
 * @package Utility\StringUtils
 */
class Xml
{
    private $header = '<?xml version="1.0" encoding="utf-8"?>';
    private $rootName = 'root';
    private $nodeName = [];
    private $xml = '';

    /**
     * 将一个变量转换为Xml
     * @param $data
     * @param string $root
     * @param string $header
     * @return string
     */
    public static function encode($data, $root = 'root', $header = '<?xml version="1.0" encoding="utf-8"?>'): string
    {
        $xml = new self();
        $xml->setHeader($header);
        $xml->setRootName($root);
        return $xml->toXml($data);
    }

    /**
     * 将一个Xml转换为关联数组
     * @param string $xml
     * @return array
     */
    public static function decode(string $xml):array
    {
        $obj = @simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
        return Utils::toArray($obj);
    }

    /**
     * 判断一个字符串是否为Xml
     * @param string $xml
     * @return bool
     */
    public static function isXml(string $xml): bool
    {
        $obj = @simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
        return $obj !== false;
    }

    /**
     * @param $data
     * @return string
     */
    public function toXml($data): string
    {
        $this->xml = '';
        $this->nodeName = [];
        $this->parse(json_decode(Json::encode([$this->rootName => $data])));
        return $this->header . $this->xml;
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param string $header
     */
    public function setHeader(string $header)
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getRootName(): string
    {
        return $this->rootName;
    }

    /**
     * @param string $rootName
     */
    public function setRootName(string $rootName)
    {
        $this->rootName = $rootName;
    }

    /**
     * @param $data
     */
    private function parse($data)
    {
        $type = gettype($data);
        switch($type){
            case 'boolean':
                $this->xml .= $data ? 'true' : 'false';
                break;
            case 'integer':
            case 'double':
                $this->xml .= $data;
                break;
            case 'string':
                $this->xml .= htmlspecialchars($data);
                break;
            case 'array':
                $last = count($data) - 1;
                $lastNode = count($this->nodeName) - 1;
                foreach($data as $key => $value){
                    if($key !== 0){
                        $this->xml .= sprintf('<%s>', $this->nodeName[$lastNode]);
                    }
                    if($value !== '' || $value != []){
                        $this->parse($value);
                    }
                    if($key !== $last){
                        $this->xml .= sprintf('</%s>', $this->nodeName[$lastNode]);
                    }
                }
                break;
            case 'object':
                foreach($data as $key => $value){
                    $this->xml .= sprintf('<%s>', $key);
                    array_push($this->nodeName, $key);
                    $this->parse($value);
                    $this->xml .= sprintf('</%s>', array_pop($this->nodeName));
                }
                break;
            case 'NULL':
                $this->xml .= 'NULL';
                break;
            default:
                throw new BadFunctionCallException(sprintf('The variable type %s cannot be converted to XML', $type));
        }
    }
}