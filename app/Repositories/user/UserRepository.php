<?php

namespace App\Repositories\user;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return User::paginate(5);
    }

    public function createUser($data)
    {
        // TODO: Implement createUser() method.
    }

    public function getUserById($id): User|null
    {
        return User::find($id);
    }

    public function updateUser(User $user, $data)
    {
        // TODO: Implement updateUser() method.
    }

    public function deleteUser(User $user)
    {
        // TODO: Implement deleteUser() method.
    }

    public function filterUser($data)
    {
        // TODO: Implement filterUser() method.
    }
}
