<?php
namespace Utility\Datetime;

use Utility\DecimalUtils\Utils;

/**
 * 时间戳
 * Class Timestamp
 * @package Utility\Datetime
 */
class Timestamp
{
    private $timestamp;

    /**
     * Timestamp constructor.
     * @param int|null $timestamp
     */
    public function __construct(int $timestamp = null)
    {
        $this->timestamp = is_null($timestamp) ? (int)bcmul(microtime(true), 1000000) : $timestamp;
    }

    /**
     * 秒级时间戳
     * @return int
     */
    public function timestamp(): int
    {
        return $this->multiple(10);
    }

    /**
     * 毫秒级时间戳
     * @return int
     */
    public function milliTimestamp(): int
    {
        return $this->multiple(13);
    }

    /**
     * 微秒级时间戳
     * @return int
     */
    public function microTimestamp(): int
    {
        return $this->multiple(16);
    }

    /**
     * 纳秒级时间戳
     * @return int
     */
    public function nanoTimestamp(): int
    {
        return $this->multiple(19);
    }

    /**
     * 倍数计算
     * @param int $multiple
     * @return int
     */
    private function multiple(int $multiple) : int
    {
        $digits = Utils::digits($this->timestamp);
        $pow = intval(bcsub($multiple, $digits));
        return $pow === 0 ? $this->timestamp : (int)bcmul($this->timestamp, bcpow(10, $pow, abs($pow)));
    }
}