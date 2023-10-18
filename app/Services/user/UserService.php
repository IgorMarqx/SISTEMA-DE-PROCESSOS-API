<?php

namespace App\Services\user;

use App\Models\User;
use App\Repositories\user\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->userRepository->getAll();
    }

    public function createUser($data)
    {
        return $this->userRepository->createUser($data);
    }

    public function getUserById($id): User|null
    {
        return $this->userRepository->getUserById($id);
    }

    public function updateUser($user, $data)
    {
        return $this->userRepository->updateUser($user, $data);
    }

    public function deleteUser($user)
    {
        return $this->userRepository->deleteUser($user);
    }

    public function filterUser($data)
    {
        return $this->userRepository->filterUser($data);
    }
}
