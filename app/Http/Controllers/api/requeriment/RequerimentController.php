<?php

namespace App\Http\Controllers\api\requeriment;

use App\Http\Controllers\Controller;
use App\Services\requeriment\RequerimentService;
use Illuminate\Http\Request;

class RequerimentController extends Controller
{
    private RequerimentService $requerimentService;

    public function __construct(RequerimentService $requerimentService)
    {
        $this->requerimentService = $requerimentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
