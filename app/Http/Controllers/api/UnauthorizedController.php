<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnauthorizedController extends Controller
{
    public function unauthorized(): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => 'Unauthorized',
            'timestamps' => now()->format('Y-m-d H:i:s'),
            'method' => request()->method(),
            'status'  => 401,
        ], 401);
    }
}
