<?php

namespace App\Http\Controllers\api\filter;

use App\Http\Controllers\Controller;
use App\Http\Requests\filter\CollectiveFilterRequest;
use App\Http\Resources\GlobalResource;
use App\Services\process\ProcessService;

class CollectiveFilterController extends Controller
{
    protected ProcessService $collectiveService;

    public function __construct(ProcessService $collectiveService)
    {
        $this->collectiveService = $collectiveService;
    }

    /**
     * @throws \Exception
     */
    public function filterCollective(CollectiveFilterRequest $request): GlobalResource
    {
        $collective = $this->collectiveService->filterCollective($request);

        if(!$collective) {
            return new GlobalResource(['error' => true, 'message' => 'Process process not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => $collective], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
