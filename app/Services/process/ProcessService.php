<?php

namespace App\Services\process;

use App\Models\Process;
use App\Repositories\process\ProcessRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProcessService
{
    protected ProcessRepositoryInterface $collectiveRepository;

    public function __construct(ProcessRepositoryInterface $collectiveRepository)
    {
        $this->collectiveRepository = $collectiveRepository;
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->collectiveRepository->getAll();
    }

    public function createCollective($data): Process
    {
        return $this->collectiveRepository->createCollective($data);
    }

    public function getCollectiveById($id): Process|null
    {
        return $this->collectiveRepository->getCollectiveById($id);
    }

    public function updateCollective($id, $data): bool|Process|array
    {
        $collective = $this->getCollectiveById($id);

        if($collective['type_process'] !== $data['type_process']) {
            return ['error' => true, 'httpCode' => 400];
        }

        if (!$collective) {
            return false;
        }

        return $this->collectiveRepository->updateCollective($collective, $data);
    }

    public function finishedCollective($id): bool
    {
        $collective = $this->getCollectiveById($id);

        if (!$collective) {
            return false;
        }

        if ($collective->finish && $collective->progress === 0) {
            return false;
        }

        return $this->collectiveRepository->finishedCollective($collective, [
            'progress'   => 0,
            'update'     => 0,
            'finish'     => 1,
            'qtd_finish' => $collective->qtd_finish + 1,
            'updated_at' => now(),
        ]);
    }

    public function deleteCollective($id): bool|null
    {
        $collective = $this->getCollectiveById($id);

        if (!$collective) {
            return false;
        }

        return $this->collectiveRepository->deleteCollective($collective);
    }

    public function filterCollective($data): bool|LengthAwarePaginator
    {
        $collective = $this->collectiveRepository->filterCollective($data);

        if ($collective->isEmpty()) {
            return false;
        }

        return $collective;
    }
}
