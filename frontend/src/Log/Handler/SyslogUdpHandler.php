<?php

namespace BGDS\Log\Handler;

use Monolog\Logger;

/**
 * Class SyslogUdpHandler
 * @package BGDS\Log\Handler
 */
class SyslogUdpHandler extends \Monolog\Handler\SyslogUdpHandler
{
    /**
     * @var string
     */
    protected $component;

    /**
     * SyslogUdpHandler constructor.
     * @param string $component
     * @param string $host
     * @param int $port
     * @param int|string $facility
     * @param bool|int $level
     * @param bool $bubble
     * @param string $ident
     * @param int $rfc
     */
    public function __construct(string $component, string $host, int $port = 514, $facility = LOG_USER, $level = Logger::DEBUG, bool $bubble = true, string $ident = 'php', int $rfc = self::RFC5424)
    {
        parent::__construct($host, $port, $facility, $level, $bubble, $ident);
        $this->component = $component;
    }
}
