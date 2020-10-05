<?php

namespace App\Console\Commands;

use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Monolog\Logger;

/**
 * Class AlfredCommand
 * @package App\Console
 */
abstract class BaseCommand extends Command
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * AlfredCommand constructor.
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        parent::__construct();
        $this->logger = $logger;
    }
    abstract protected function executeCommand();

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $benchmarkStart = microtime(true);
        $this->output->writeln('<info>BEGIN ' . $this->getName() . '</info>');
        $this->logger->notice(
            'START',
            [
                'at'=> date('Y-m-d H:i:s', round($benchmarkStart))
            ]
        );
        $this->executeCommand();
        $this->output->writeln('<info>END ' . $this->getName() . '</info>');
        $benchmarkEnd = microtime(true);
        $benchmarkDiff = number_format($benchmarkEnd - $benchmarkStart, 2);
        $this->logger->notice(
            'END',
            [
                'at' => date('Y-m-d H:i:s', round($benchmarkEnd)),
                'runtime' => $benchmarkDiff.' s'
            ]
        );

        return 0;
    }

    /**
     * @param string $name
     * @param string $date
     * @throws \Exception
     */
    public function pushStreamHandler(string $name, string $date = '')
    {
        $level = Logger::INFO;
        if (($envLevel = @constant('\Monolog\Logger::' . $_SERVER['SYSLOG_LOG_LEVEL']))) {
            $level = $envLevel;
        }

        $this->logger->pushHandler(
            new StreamHandler(
                $this->getLogFilename($name, $date),
                $level
            )
        );
    }

    /**
     * @param string $name
     * @param string $date
     * @return string
     */
    private function getLogFilename(string $name, string $date)
    {
        if (empty($name)) {
            return '/dev/null';
        }

        $actualDate = $date ? $date : date('Ymd');
        $dir = sprintf('%s/log/%s', $_SERVER['TMP_DIR'], $actualDate);
        @mkdir($dir, 0777, true);
        return "$dir/$name.log";
    }
}