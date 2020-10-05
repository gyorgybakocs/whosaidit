<?php

namespace BGDS\Data\Normalizer;

use BGDS\Data\Item;

/**
 * Class Normalizer
 * @package BGDS\Data\Normalizer
 */
class Normalizer
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param Item $item
     * @return array
     */
    public function normalize(Item $item)
    {
        $itemData = [];
        foreach ($item->getHeaders() as $key => $index) {
            $value = $item->get($key);
            $splited = explode('|', $value);
            $itemData[$key] = count($splited) > 1 ? $splited : $value;
        }
        $this->data[] = $itemData;
        return $this->data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}