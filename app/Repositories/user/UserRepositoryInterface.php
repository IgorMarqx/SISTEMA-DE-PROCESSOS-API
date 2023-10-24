<?php

namespace App\Repositories\user;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function createUser($data): User;
    public function getUserById($id): User|null;
    public function updateUser(User $user, $data);
    public function deleteUser(User $user): bool;
    public function filterUser($data);
}
