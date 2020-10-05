<?php

$quizData = require 'usage.php';

return [
    'mustBeMoreAlbums' => ['2' => 4, '6'=> 2, '11' => 4],
    'mustBeLyrics' => $quizData['lyricshu'],
    'mustBeSingerImage' => ['7',],
    'mustBeImage' => ['8',],
    'mustBeSinger' => ['7', '9', '14',],
    'mustBeBillboard' => ['15', '17',],
    'mustBeUKChart' => ['16', '18',],
    '0' => [
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'alone' => [],
        'lyrics' => [],
    ],
    '1' => [
        'answer' => [
            'answer' => 'album.release_year',
        ],
        'wrongs' => [
            'wrongs' => 'randomYears.album',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '2' => [
        'answer' => [
            'answer' => 'album.title',
        ],
        'wrongs' => [
            'wrongs' => 'randomAlbum.band',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '3' => [
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'alone' => [],
        'lyrics' => [
            'maxSelection' => 5,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
    ],
    '4' => [
        'answer' => [
            'answer' => 'track.title',
        ],
        'wrongs' => [
            'wrongs' => 'randomTrack',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [
            'maxSelection' => 5,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
    ],
    '5' => [
        'answer' => [
            'answer' => 'album.release_year',
        ],
        'wrongs' => [
            'wrongs' => 'randomYears.album',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'firstAlbum' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [
                'firstAlbum' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '6' => [
        'answer' => [
            'answer' => 'album.title',
        ],
        'wrongs' => [
            'wrongs' => 'randomAlbum.band',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'firstAlbum' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [
                'firstAlbum' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '7' => [
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomBand' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 1,
            'yes' => [],
        ],
        'alone' => [],
        'lyrics' => [],
    ],
    '8' => [
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomBand' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 1,
            'yes' => [],
        ],
        'alone' => [],
        'lyrics' => [],
    ],
    '9' => [
        'answer' => [
            'answer' => 'band.singer',
        ],
        'wrongs' => [
            'wrongs' => 'randomSinger',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomBand' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [],
        ],
        'lyrics' => [],
    ],
    '10' => [
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'alone' => [],
        'lyrics' => [],
    ],
    '11' => [
        'answer' => [
            'answer' => 'album.title',
        ],
        'wrongs' => [
            'wrongs' => 'randomAlbum.band',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '12' => [
        'answer' => [
            'answer' => 'track.title',
        ],
        'wrongs' => [
            'wrongs' => 'randomDiffTrack',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 3,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '13' => [
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'firstAlbum' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 1,
            'yes' => [
                'firstAlbum' => true,
            ],
        ],
        'alone' => [],
        'lyrics' => [],
    ],
    '14' => [
        'maxSelection' => [

        ],
        'answer' => [
            'answer' => 'band.name',
        ],
        'wrongs' => [
            'wrongs' => 'randomBand',
        ],
        'all' => [
            'maxSelection' => 3,
            'yes' => [
                'randomBand' => true,
            ],
        ],
        'fight' => [
            'maxSelection' => 1,
            'yes' => [],
        ],
        'alone' => [],
        'lyrics' => [],
    ],
    '15' => [
        'answer' => [
            'answer' => 'track.billboard_pos',
        ],
        'wrongs' => [
            'wrongs' => 'randomPosition',
        ],
        'all' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '16' => [
        'answer' => [
            'answer' => 'track.uk_top_40_pos',
        ],
        'wrongs' => [
            'wrongs' => 'randomPosition',
        ],
        'all' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '17' => [
        'answer' => [
            'answer' => 'track.billboard_year',
        ],
        'wrongs' => [
            'wrongs' => 'randomYears.chart.us',
        ],
        'all' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
    '18' => [
        'answer' => [
            'answer' => 'track.uk_top_40_year',
        ],
        'wrongs' => [
            'wrongs' => 'randomYears.chart.uk',
        ],
        'all' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'fight' => [],
        'alone' => [
            'maxSelection' => 1,
            'yes' => [
                'randomTrack' => true,
            ],
        ],
        'lyrics' => [],
    ],
];