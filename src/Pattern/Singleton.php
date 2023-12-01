<?php
namespace Utility\Pattern;

/**
 * 单例
 * Trait Singleton
 * @package Utility\Pattern
 */
trait Singleton
{
    private static $instance;

    static function getInstance(...$args)
    {
        if(!isset(static::$instance)){
            static::$instance = new static(...$args);
        }
        return static::$instance;
    }
}
