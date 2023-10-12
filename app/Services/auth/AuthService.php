<?php

namespace App\Services\auth;

use App\Http\Resources\auth\AuthResource;
use App\Repositories\auth\AuthRepositoryInterface;

class AuthService
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login($data): null|string
    {
        return $this->authRepository->login($data);
    }
}
