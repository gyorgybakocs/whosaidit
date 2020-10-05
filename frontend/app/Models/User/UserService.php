<?php

namespace App\Models\User;

use App\Models\User\Repositories\UserRepository;
use Laravel\Socialite\Contracts\Provider;

/**
 * Class UserService
 * @package App\Models\User
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Provider
     */
    private $google;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     * @param Provider $google
     */
    public function __construct(
        UserRepository $userRepository,
        Provider $google
    ) {
        $this->userRepository = $userRepository;
        $this->google = $google;
    }

    /**
     * @param string $token
     * @return User|null
     */
    public function getUser(string $token): ?User
    {
        return $this->userRepository->getUser($this->getUserEmail($token));
    }

    /**
     * @param array $userData
     */
    public function upsert(array $userData)
    {
        $this->userRepository->upsert($userData);
    }

    /**
     * @param string $token
     * @return string
     */
    private function getUserEmail(string $token): string
    {
        return $this->google->userFromToken($token)->email;
    }
}
