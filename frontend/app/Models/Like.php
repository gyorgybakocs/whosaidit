<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'quiz_id',
        'result',
    ];

    public function getAttributes()
    {
        return $this->attributes;
    }
}
