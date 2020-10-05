<?php

namespace BGDS\Data;

/**
 * Class Item
 * @package BGDS\Data
 */
class Item
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var array
     */
    protected $info;

    /**
     * @var array
     */
    public $extraData = [];

    /**
     * Item constructor.
     *
     * @param array $data
     * @param array $headers
     * @param array $info
     */
    public function __construct(array $data, array $headers, array $info)
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->info = $info;
    }

    /**
     * @param $key
     * @param string $defVal
     * @return string
     */
    public function get($key, $defVal = '')
    {
        return !empty($key) ? trim($this->data[$this->headers[$key]]) : $defVal;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param $key
     * @param string $defVal
     * @return mixed|string
     */
    public function getInfo($key, $defVal = '')
    {
        return isset($this->info[$key]) ? $this->info[$key] : $defVal;
    }

    /**
     * @param $key
     * @param string $defVal
     * @return mixed|string
     */
    public function getExtraData($key, $defVal = '')
    {
        return isset($this->extraData[$key]) ? $this->extraData[$key] : $defVal;
    }

    /**
     * @param $key
     * @param $val
     */
    public function setExtraData($key, $val)
    {
        $this->extraData[$key] = $val;
    }

    /**
     * @return array
     */
    public function getAllInfo(): array
    {
        return $this->info;
    }

    /**
     * @return array
     */
    public function getAllExtraData(): array
    {
        return $this->extraData;
    }
}
