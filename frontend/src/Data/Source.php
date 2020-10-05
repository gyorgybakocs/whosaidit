<?php

namespace BGDS\Data;
use BGDS\Data\Normalizer\Normalizer;

/**
 * Interface Source
 * @package BGDS\Data
 */
interface Source
{
    const INFO_COUNTRY = 0;

    /**
     * @param $sourceUri
     * @return mixed
     */
    public function open($sourceUri);

    /**
     * @param Normalizer $normalizer
     * @return mixed
     */
    public function save(Normalizer $normalizer);
}
