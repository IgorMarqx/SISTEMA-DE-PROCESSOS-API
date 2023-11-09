<?php

namespace App\Services\requeriment;

use App\Repositories\requeriment\RequerimentRepository;
use Illuminate\Database\Eloquent\Collection;

class RequerimentService
{
    private RequerimentRepository $requerimentRepository;

    public function __construct(RequerimentRepository $requerimentRepository)
    {
        $this->requerimentRepository = $requerimentRepository;
    }

    public function getAll(): Collection
    {
        return $this->requerimentRepository->getAll();
    }

    public function createRequeriment(array $data): bool
    {
        return $this->requerimentRepository->createRequeriment($data);
    }

    public function getRequerimentById(string $id): Collection|null
    {
        return $this->requerimentRepository->getRequerimentById($id);
    }

    public function updateRequeriment(array $data, string $id): bool
    {
        $requeriment = $this->requerimentRepository->getRequerimentById($id);

        if(!$requeriment) {
            return false;
        }

        return $this->requerimentRepository->updateRequeriment($requeriment, $data);
    }

    public function deleteRequeriment(string $id)
    {
        return $this->requerimentRepository->deleteRequeriment($id);
    }

    public function filterRequeriment(array $data)
    {
        return $this->requerimentRepository->filterRequeriment($data);
    }

    public function downloadRequerimnet(array $data, string $id)
    {
        return $this->requerimentRepository->downloadRequerimnet($data, $id);
    }
}
