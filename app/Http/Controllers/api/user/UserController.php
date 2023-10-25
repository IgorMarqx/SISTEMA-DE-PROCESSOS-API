<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Http\Resources\GlobalResource;
use App\Services\user\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     * @throws \Exception
     */
    public function index(): GlobalResource
    {
        $user = $this->userService->getAll();

        try {
            return new GlobalResource(['error' => false, 'message' => $user], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(UserRequest $request): GlobalResource
    {
        $this->userService->createUser($request);

        try {
            return new GlobalResource(['error' => false, 'message' => 'Success creating user'], 201);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @throws \Exception
     */
    public function show(string $id): GlobalResource
    {
        $user = $this->userService->getUserById($id);

        if (!$user) {
            return new GlobalResource(['error' => true, 'message' => 'User not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => $user], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     * @throws \Exception
     */
    public function update(UserRequest $request, string $id): GlobalResource
    {
        $user = $this->userService->updateUser($id, $request);

        if(!$user){
            return new GlobalResource(['error' => true, 'message' => 'User not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => 'Success updating user'], 200);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(string $id): GlobalResource
    {
        $user = $this->userService->deleteUser($id);

        if(!$user) {
            return new GlobalResource(['error' => true, 'message' => 'User not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => 'Success deleting user'], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
