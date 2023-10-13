<?php

namespace App\Services\collective;

use App\Models\Collective;
use App\Repositories\collective\CollectiveRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectiveService
{
    protected CollectiveRepositoryInterface $collectiveRepository;

    public function __construct(CollectiveRepositoryInterface $collectiveRepository)
    {
        $this->collectiveRepository = $collectiveRepository;
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->collectiveRepository->getAll();
    }

    public function createCollective($data): Collective
    {
        return $this->collectiveRepository->createCollective($data);
    }

    public function getCollectiveById($id): bool|Collective
    {
        return $this->collectiveRepository->getCollectiveById($id);
    }

    public function finishedCollective($id): bool
    {
        $collective = $this->getCollectiveById($id);

        if (!$collective) {
            return false;
        }

        if($collective->finish && $collective->progress === 0) {
            return false;
        }

        return $this->collectiveRepository->finishedCollective($collective, [
            'progress'   => 0,
            'finish'     => 1,
            'qtd_finish' => $collective->qtd_finish + 1,
            'updated_at' => now(),
        ]);
    }
}
