<?php

namespace App\Repositories\requeriment;

use App\Models\Requeriment;
use Illuminate\Database\Eloquent\Collection;

interface RequerimentRepositoryInterface
{
    public function getAll(): Collection;
    public function createRequeriment(array $data): bool;
    public function getRequerimentById(string $id): Collection|null;
    public function updateRequeriment(Requeriment $requeriment, array $data): bool;
    public function deleteRequeriment(Requeriment $requeriment, string $id);
    public function filterRequeriment(array $data);
    public function downloadRequerimnet(array $data, string $id);
}
