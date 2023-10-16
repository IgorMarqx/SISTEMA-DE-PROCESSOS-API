<?php

namespace App\Http\Controllers\api\process;

use App\Http\Controllers\Controller;
use App\Http\Requests\collective\CollectiveRequest;
use App\Http\Resources\GlobalResource;
use App\Services\collective\CollectiveService;
use Illuminate\Http\Request;

class CollectiveController extends Controller
{
    protected CollectiveService $collectiveService;

    public function __construct(CollectiveService $collectiveService)
    {
        $this->collectiveService = $collectiveService;
    }

    /**
     * Display a listing of the resource.
     * @throws \Exception
     */
    public function index(): GlobalResource
    {
        $collective = $this->collectiveService->getAll();

        try {
            return new GlobalResource(['error' => false, 'message' => $collective], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Exception
     */
    public function store(CollectiveRequest $request): GlobalResource
    {
        $this->collectiveService->createCollective($request);

        try {
            return new GlobalResource(['error' => false, 'message' => 'Successfully created collective process'], 201);
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
        $collective = $this->collectiveService->getCollectiveById($id);

        try {
            return new GlobalResource(['error' => false, 'message' => $collective], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * @throws \Exception
     */
    public function finishedCollective($id): GlobalResource
    {
        $collective = $this->collectiveService->finishedCollective($id);

        if (!$collective) {
            return new GlobalResource(['error' => true, 'message' => 'Collective process already finished'], 400);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => 'Successfully finished collective process'], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(string $id): GlobalResource
    {
        $collective = $this->collectiveService->deleteCollective($id);

        if (!$collective) {
            return new GlobalResource(['error' => true, 'message' => 'Collective process not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => 'Successfully deleted collective process'], 200);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
