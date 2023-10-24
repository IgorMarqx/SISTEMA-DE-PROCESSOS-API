<?php

namespace App\Repositories\auth;

use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login($data): string
    {
        $token = Auth::attempt([
            'email'    => $data->email,
            'password' => $data->password,
        ]);

        \auth()->user()->update([
            'token' => $token,
        ]);

        return $token;
    }
}
