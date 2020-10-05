<?php

namespace App\Providers;

use BGDS\Log\Handler\SyslogUdpHandler;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\PsrLogMessageProcessor;

class LogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Logger::class, function () {
            $loggerFormat = sprintf(
                '%s %s %s %s',
                '[%datetime% / %level_name% / %channel%]',
                '[message: %message%]',
                '[context: %context%]',
                '[extra: %extra%]'
            );
            $loggerTimeFormat = "Y-m-d H:i:s";
            $formatter = new LineFormatter($loggerFormat, $loggerTimeFormat);
            $formatter->ignoreEmptyContextAndExtra(true);

            $logger = new Logger(env('LOG_CHANNEL'));
            $syslog = new SyslogUdpHandler(
                'syslog',
                env('SYSLOG_NG_HOST'),
                env('SYSLOG_NG_PORT'),
                LOG_SYSLOG,
                env('SYSLOG_LOG_LEVEL')
            );

            $logger->pushProcessor(new IntrospectionProcessor(Logger::WARNING));
            $logger->pushProcessor(new PsrLogMessageProcessor());
            $syslog->setFormatter($formatter);
            $logger->pushHandler($syslog);
            return $logger;
        });
    }
}
