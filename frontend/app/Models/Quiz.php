<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'quiid',
        'permanent',
    ];

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
