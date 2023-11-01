<?php

namespace App\Repositories\requeriment;

use App\Models\Requeriment;

interface RequerimentRepositoryInterface
{
    public function getAll();
    public function createRequeriment(array $data);
    public function getRequerimentById(string $id);
    public function updateRequeriment(Requeriment $requeriment, string $id);
    public function deleteRequeriment(Requeriment $requeriment,string $id);
    public function filterRequeriment(array $data);
}
