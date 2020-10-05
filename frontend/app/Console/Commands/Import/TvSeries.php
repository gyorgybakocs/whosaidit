<?php

namespace App\Console\Commands\Import;

use App\Console\Commands\BaseCommand;
use BGDS\Data\FileSystem\Csv;
use BGDS\Data\Normalizer\Normalizer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Models\TvSerie;

/**
 * Class Band
 * @package App\Console\Commands\Import
 */
class TvSeries extends BaseCommand
{
    protected $signature = 'import:tvseries';

    /**
     * @var string
     */
    private $file;

    /**
     * @var Csv
     */
    private $processor;

    /**
     * @var Normalizer
     */
    private $normalier;

    protected function configure()
    {
        parent::configure();
        $this->setDescription('Import all tv series from csv')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'File to process'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Exception
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->file = $this->input->getArgument('file');
        if (empty($this->file)) {
            $this->logger->error("Cannot import - wrong filename");
            throw new \Exception('WRONG FILENAME!');
        }
    }

    protected function executeCommand()
    {
        $this->processor = new Csv();
        $this->normalier = new Normalizer();
        $this->processor->open($this->file);
        $this->processor->save($this->normalier);
        $tvSeries = $this->normalier->getData();

        foreach ($tvSeries as $tvSerie) {
            if(!TvSerie::where('title', $tvSerie['tv_series'])->exists()){
                TvSerie::create([
                    'title' => $tvSerie['tv_series'],
                    'series_info' => $tvSerie['series_info'],
                ]);
            }
        }
    }
}
