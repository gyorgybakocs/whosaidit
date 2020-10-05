<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models\User
 */
class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'profile_image',
        'open_id',
        'first_login',
    ];
}
