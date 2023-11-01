<?php

namespace App\Repositories\requeriment;

use App\Models\Requeriment;

class RequerimentRepository implements RequerimentRepositoryInterface
{
    public function getAll()
    {
        return Requeriment::all();
    }

    public function createRequeriment(array $data)
    {
        return Requeriment::create($data);
    }

    public function getRequerimentById(string $id)
    {
        // TODO: Implement getRequerimentById() method.
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
