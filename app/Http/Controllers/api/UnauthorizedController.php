<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GlobalResource;

class UnauthorizedController extends Controller
{
    public function unauthorized(): GlobalResource
    {
        return new GlobalResource(['error' => true, 'message' => 'Unauthorized', ], 401);
    }
}
