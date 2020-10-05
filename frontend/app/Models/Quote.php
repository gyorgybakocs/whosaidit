<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';

    protected $fillable = [
        'tvseries_id',
        'series_season',
        'series_episode',
        'count',
        'quote_hu',
        'quote_en',
        'person',
        'video_url_hu',
        'video_url_en',
        'gif_url_hu',
        'gif_url_en',
        'img_url_hu',
        'img_url_en',
    ];

    public function getAttributes()
    {
        return $this->attributes;
    }
}


