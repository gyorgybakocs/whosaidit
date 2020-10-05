<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TvSerie extends Model
{
    protected $table = 'tvseries';

    protected $fillable = [
        'title',
        'series_info',
    ];

    public function getAttributes()
    {
        return $this->attributes;
    }
}
