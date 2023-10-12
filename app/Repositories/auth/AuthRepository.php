<?php

namespace App\Repositories\auth;

use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login($data): string
    {
        return Auth::attempt([
            'email' => $data->email,
            'password' => $data->password
        ]);
    }
}
