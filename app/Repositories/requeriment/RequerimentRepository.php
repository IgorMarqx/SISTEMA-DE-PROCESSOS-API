<?php

namespace App\Repositories\requeriment;

use App\Models\Requeriment;
use Illuminate\Database\Eloquent\Collection;

class RequerimentRepository implements RequerimentRepositoryInterface
{
    public function getAll(): Collection
    {
        return Requeriment::all();
    }

    public function createRequeriment(array $data): bool
    {
        return Requeriment::create($data);
    }

    public function getRequerimentById(string $id): Collection|null
    {
        return Requeriment::find($id);
    }
    public function updateRequeriment(Requeriment $requeriment, string $id)
    {
        // TODO: Implement updateRequeriment() method.
    }
    public function deleteRequeriment(Requeriment $requeriment, string $id)
    {
        // TODO: Implement deleteRequeriment() method.
    }
    public function filterRequeriment(array $data)
    {
        // TODO: Implement filterRequeriment() method.
    }
    public function downloadRequerimnet(array $data, string $id)
    {
        // TODO: Implement downloadRequerimnet() method.
    }

}
