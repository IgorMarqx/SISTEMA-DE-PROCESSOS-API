<?php

namespace App\Services\requeriment;

use App\Repositories\requeriment\RequerimentRepository;

class RequerimentService
{
    private RequerimentRepository $requerimentRepository;

    public function __construct(RequerimentRepository $requerimentRepository)
    {
        $this->requerimentRepository = $requerimentRepository;
    }

    public function getAll()
    {
        return $this->requerimentRepository->getAll();
    }

    public function createRequeriment(array $data)
    {
        return $this->requerimentRepository->createRequeriment($data);
    }

    public function getRequerimentById(string $id)
    {
        return $this->requerimentRepository->getRequerimentById($id);
    }

    public function updateRequeriment(array $data, string $id)
    {
        return $this->requerimentRepository->updateRequeriment($data, $id);
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
