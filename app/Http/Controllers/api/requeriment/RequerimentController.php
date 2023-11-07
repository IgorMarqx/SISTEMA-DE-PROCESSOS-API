<?php

namespace App\Http\Controllers\api\requeriment;

use App\Http\Controllers\Controller;
use App\Http\Requests\requeriment\RequerimentRequest;
use App\Http\Resources\GlobalResource;
use App\Services\requeriment\RequerimentService;
use Exception;

class RequerimentController extends Controller
{
    private RequerimentService $requerimentService;

    public function __construct(RequerimentService $requerimentService)
    {
        $this->requerimentService = $requerimentService;
    }

    /**
     * Display a listing of the resource.
     * @throws Exception
     */
    public function index(): GlobalResource
    {
        $requeriment = $this->requerimentService->getAll();

        try {
            return new GlobalResource(['error' => false, 'message' => $requeriment], 200);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     * @throws Exception
     */
    public function store(RequerimentRequest $request): GlobalResource
    {
        $this->requerimentService->createRequeriment((array)$request);

        try {
            return new GlobalResource(['error' => false, 'message' => 'Requeriment created succesfully'], 201);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     * @throws Exception
     */
    public function show(string $id): GlobalResource|null
    {
        $requeriment = $this->requerimentService->getRequerimentById($id);

        if (!$requeriment) {
            return new GlobalResource(['error' => true, 'message' => 'Requeriment not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => $requeriment], 200);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     * @throws Exception
     */
    public function update(RequerimentRequest $request, string $id): GlobalResource
    {
        $requeriment = $this->requerimentService->updateRequeriment($request, $id);

        try {
            return new GlobalResource(['error' => false, 'message' => $requeriment], 200);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
