<?php

namespace App\Console\Commands\Import;

use App\Console\Commands\BaseCommand;
use App\Models\TvSerie;
use BGDS\Data\FileSystem\Csv;
use BGDS\Data\Normalizer\Normalizer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Models\Quote;

/**
 * Class Band
 * @package App\Console\Commands\Import
 */
class Quotes extends BaseCommand
{
    protected $signature = 'import:quotes';

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
        $this->setDescription('Import all quotes from csv')
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
        $quotes = $this->normalier->getData();

        foreach ($quotes as $quote) {
            //using name to find the tv-serie's id
            $tvSerie = TvSerie::where('title', $quote['tv_series'])->firstOrFail(['tvsid']);
            $seriesId = $tvSerie->tvsid;
            //if we have this quotes, do not do anything...
            if(!Quote::where('quote_en', $quote['quote_en'])->exists()){
                $video = sprintf(
                    'videos/v_%s_%s.%s.%s_640x360_',
                    strtolower($quote['tv_series']),
                    strtolower($quote['season']),
                    strtolower($quote['episode']),
                    strtolower($quote['count'])
                );
                $img = sprintf(
                    'videos/v_%s_',
                    strtolower($quote['tv_series'])
                );
                Quote::create([
                    'tvseries_id' => $seriesId,
                    'series_season' => $quote['season'],
                    'series_episode' => $quote['episode'],
                    'count' => $quote['count'],
                    'quote_hu' => $quote['quote_hu'],
                    'quote_en' => $quote['quote_en'],
                    'person' => $quote['person'],
                    'video_url_hu' => $video . 'hu.webm',
                    'video_url_en' => $video . 'en.webm',
                    'gif_url_hu' => $img . 'hu.gif',
                    'gif_url_en' => $img . 'en.gif',
                    'img_url_hu' => $img . 'hu.jpg',
                    'img_url_en' => $img . 'en.jpg',
                ]);
            }
        }
    }
}
