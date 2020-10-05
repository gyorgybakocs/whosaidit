<?php

namespace BGDS\Data;

use BGDS\Data\Normalizer\Normalizer;
use Illuminate\Support\Facades\Cookie;

/**
 * Class FileSystem
 * @package Iprice\Data\Source
 */
abstract class FileSystem implements Source
{
    /**
     * @var resource
     */
    protected $handler;

    /**
     * @var array
     */
    protected $fileInfo = [];

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var String
     */
    protected $sourceUri = '';

    public function __destruct()
    {
        $this->close();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getExtension();
    }

    /**
     * @param $sourceUri
     * @return $this
     */
    public function open($sourceUri)
    {
        if (file_exists($sourceUri) === false) {
            throw new \InvalidArgumentException("Filename $sourceUri is invalid");
        }

        $this->close()->handler = $this->spawn($sourceUri);
        $this->fileInfo = [
            self::INFO_COUNTRY => strtoupper(Cookie::get('cc')),
        ];

        $this->headers = (array)@array_flip($this->readLine());

        $this->sourceUri = $sourceUri;

        return $this;
    }

    /**
     * @param Normalizer $normalizer
     * @return $this|mixed
     */
    public function save(Normalizer $normalizer)
    {
        if ($this->handler === null) {
            return $this;
        }
        while (($line = $this->readLine()) !== false) {
            $item = new Item($line, $this->headers, $this->fileInfo);
            $normalizer->normalize($item);
        }

        return $this->rewind();
    }

    /**
     * @return array
     */
    public function read()
    {
        $result = [];
        if ($this->handler === null) {
            return $result;
        }
        while (($line = $this->readLine()) !== false) {
            $result[] = new Item($line, $this->headers, $this->fileInfo);
        }

        return $result;
    }

    /**
     * @param $sourceUri
     * @return mixed
     */
    abstract protected function spawn($sourceUri);

    /**
     * @return mixed
     */
    abstract protected function despawn();

    /**
     * @return mixed
     */
    abstract protected function readLine();

    /**
     * @return mixed
     */
    abstract protected function rewind();

    /**
     * @return mixed
     */
    abstract protected function getExtension();

    /**
     * @return $this|mixed
     */
    protected function close()
    {
        if ($this->handler === null) {
            return $this;
        }
        return $this->despawn();
    }

    /**
     * @return static
     */
    protected function create()
    {
        return new static;
    }
}
