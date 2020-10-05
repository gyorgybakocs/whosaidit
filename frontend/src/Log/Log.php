<?php

namespace BGDS\Log;

use Monolog\ErrorHandler;
use Monolog\Logger;

class Log
{
    /**
     * @var Logger
     */
    private static $logger = null;

    /**
     * @return Logger
     */
    public static function get()
    {
        if (null == self::$logger) {
            self::$logger = new Logger('eslogger');
            ErrorHandler::register(self::$logger);
        }

        return self::$logger;
    }
}
