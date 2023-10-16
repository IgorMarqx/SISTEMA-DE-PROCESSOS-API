<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\AuthRequest;
use App\Http\Resources\auth\TokenResource;
use App\Http\Resources\GlobalResource;
use App\Services\auth\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @throws \Exception
     */
    public function login(AuthRequest $request): GlobalResource|TokenResource
    {
        $token = $this->authService->login($request);

        if(!$token) {
            return new GlobalResource(['error' => true, 'message' => 'Unauthorized/User not found'], 401);
        }

        try {
            return new TokenResource($token);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
