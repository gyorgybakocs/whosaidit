<?php

namespace BGDS\Log\Formatter;

/**
 * Class JsonFormatter
 * @package Iprice\Library\Log\Formatter
 */
class JsonFormatter extends \Monolog\Formatter\JsonFormatter
{
    /**
     * @var string
     */
    protected $component = 'unknown';

    /**
     * @param string $component
     */
    public function setComponent(string $component)
    {
        $this->component = $component;
    }

    /**
     * @param array $record
     * @return string
     */
    public function format(array $record): string
    {
        $logRecord = [
            'application' => $record['channel'],
            'timestamp' => $record['datetime'],
            'component' => $this->component,
            'level' => $record['level_name'],
            'message' => $record['message'],
            'data' => $record['context'],
        ];

        return parent::format($logRecord);
    }
}
