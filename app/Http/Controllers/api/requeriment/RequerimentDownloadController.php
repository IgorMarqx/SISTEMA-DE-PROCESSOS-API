<?php

namespace App\Http\Controllers\api\requeriment;

use App\Http\Controllers\Controller;
use App\Http\Requests\requeriment\RequerimentRequest;
use App\Services\requeriment\RequerimentService;

class RequerimentDownloadController extends Controller
{
    private RequerimentService $requerimentService;

    public function __construct(RequerimentService $requerimentService)
    {
        $this->requerimentService = $requerimentService;
    }
    public function downloadRequeriment(RequerimentRequest $request, string $id)
    {

    }
}
