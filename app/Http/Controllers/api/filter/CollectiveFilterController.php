<?php

namespace App\Http\Controllers\api\filter;

use App\Http\Controllers\Controller;
use App\Http\Requests\filter\CollectiveFilterRequest;
use App\Http\Resources\GlobalResource;
use App\Services\collective\CollectiveService;

class CollectiveFilterController extends Controller
{
    protected CollectiveService $collectiveService;

    public function __construct(CollectiveService $collectiveService)
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
            return new GlobalResource(['error' => true, 'message' => 'Collective process not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => $collective], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
