<?php

namespace App\Repositories\auth;

interface AuthRepositoryInterface
{
    public function login($data): string;
}
