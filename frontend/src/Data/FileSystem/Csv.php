<?php

namespace BGDS\Data\FileSystem;

use BGDS\Data\FileSystem;

/**
 * Class Csv
 * @package BGDS\Data\FileSystem
 */
class Csv extends FileSystem
{
    const CSV_DEFAULT_DELIMITER = ";";
    const CSV_TAB_DELIMITER = "\t";
    const CSV_COMMA_DELIMITER = ",";

    /**
     * @var string
     */
    protected $delimiter = self::CSV_DEFAULT_DELIMITER;

    /**
     * @param $delimiter
     *
     * @return $this
     */
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    /**
     * @return $this
     */
    protected function despawn()
    {
        fclose($this->handler);
        return $this;
    }

    /**
     * @param string $sourceUri
     *
     * @return resource
     */
    protected function spawn($sourceUri)
    {
        return fopen($sourceUri, 'rb');
    }

    /**
     * @return array|bool
     */
    protected function readLine()
    {
        return fgetcsv($this->handler, null, $this->delimiter);
    }

    /**
     * @return $this
     */
    protected function rewind()
    {
        fseek($this->handler, SEEK_SET);
        return $this;
    }

    /**
     * @return string
     */
    protected function getExtension()
    {
        return 'csv';
    }
}
