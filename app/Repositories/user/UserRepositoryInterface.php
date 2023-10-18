<?php

namespace App\Repositories\user;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function createUser($data);
    public function getUserById($id): User|null;
    public function updateUser(User $user, $data);
    public function deleteUser(User $user);
    public function filterUser($data);
}
