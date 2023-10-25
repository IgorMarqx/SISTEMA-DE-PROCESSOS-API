<?php

namespace App\Repositories\user;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return User::paginate(5);
    }

    public function createUser($data): User
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'admin'     => $data['admin'],
            'organ'     => $data['organ'],
            'office'    => $data['office'],
            'capacity'  => $data['capacity'],
            'telephone' => $data['telephone'],
            'cpf'       => $data['cpf'],
            'oab'       => $data['oab'],
        ]);
    }

    public function getUserById($id): User|null
    {
        return User::find($id);
    }

    public function updateUser(User $user, $data): bool
    {
        return $user->update([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'admin'     => $data['admin'],
            'organ'     => $data['organ'],
            'office'    => $data['office'],
            'capacity'  => $data['capacity'],
            'telephone' => $data['telephone'],
            'cpf'       => $data['cpf'],
            'oab'       => $data['oab'],
        ]);
    }

    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }

    public function filterUser($data)
    {
        // TODO: Implement filterUser() method.
    }
}
