<?php

namespace App\Models\User\Repositories;

use App\Models\User\User;

/**
 * Class EloquentUserRepository
 * @package App\Models\User\Repositories
 */
class EloquentUserRepository implements UserRepository
{
    /**
     * @param $email
     * @return User|null
     */
    public function getUser($email): ?User
    {
        $eloquentUser = User::where('email', '=', $email)->first();
        if ($eloquentUser) {
            return $eloquentUser;
        }

        return null;
    }

    /**
     * @param array $userData
     * @return mixed
     */
    public function upsert(array $userData)
    {
        $eloquentUser = User::where('email', '=', $userData['email'])
            ->firstOrNew(['email' => $userData['email']]);

        foreach ($userData as $key => $value) {
            if (!empty($value)) {
                $eloquentUser->$key = $value;
            }
        }
        $eloquentUser->save();

        return $eloquentUser;
    }
}
