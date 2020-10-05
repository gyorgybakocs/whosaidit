<?php

namespace App\Models\User\Repositories;

use App\Models\User\User;

/**
 * Interface UserRepository
 * @package App\Models\User\Repositories
 */
interface UserRepository
{
    public function getUser($email): ?User;

    public function upsert(array $userData);
}
