<?php

namespace App\Http\Controllers\api\filter;

use App\Http\Controllers\Controller;
use App\Services\requeriment\RequerimentService;
use Illuminate\Http\Request;

class RequerimentFilterController extends Controller
{
    private RequerimentService $requerimentService;

    public function __construct(RequerimentService $requerimentService)
    {
        $this->requerimentService = $requerimentService;
    }

    public function filterRequeriment(Request $request)
    {
        return $this->requerimentService->filterRequeriment($request->all());
    }
}
