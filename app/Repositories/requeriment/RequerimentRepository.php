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

    public function updateRequeriment(Requeriment $requeriment, array $data): bool
    {
        return $requeriment->update([
            'officio_num'   => $data['officio_num'],
            'destination'   => $data['destination'],
            'office'        => $data['office'],
            'subject'       => $data['subject'],
            'description'   => $data['description'],
            'cord_1'        => $data['cord_1'],
            'cord_office_1' => $data['cord_office_1'],
            'cord_2'        => $data['cord_2'],
            'cord_office_2' => $data['cord_office_2'],
            'cord_3'        => $data['cord_3'],
            'cord_office_3' => $data['cord_office_3'],
        ]);
    }

    public function deleteRequeriment(Requeriment $requeriment): bool
    {
        return $requeriment->delete();
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
