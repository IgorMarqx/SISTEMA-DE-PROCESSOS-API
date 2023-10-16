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

    public function updateCollective($id, $data): bool|Process
    {
        $collective = $this->getCollectiveById($id);

        if (!$collective) {
            return false;
        }

        return $this->collectiveRepository->updateCollective($collective, [
            'name'               => $data['name'],
            'user_id'            => $data['user_id'],
            'lawyer_id'          => $data['lawyer_id'],
            'subject'            => $data['subject'],
            'jurisdiction'       => $data['jurisdiction'],
            'cause_value'        => $data['cause_value'],
            'justice_secret'     => $data['justice_secret'],
            'free_justice'       => $data['free_justice'],
            'tutelary'           => $data['tutelary'],
            'priority'           => $data['priority'],
            'judgmental_organ'   => $data['judgmental_organ'],
            'judicial_office'    => $data['judicial_office'],
            'competence'         => $data['competence'],
            'url_collective'     => $data['url_collective'],
            'url_notices'        => $data['url_notices'],
            'email_coorporative' => $data['email_coorporative'],
            'email_client'       => $data['email_client'],
            'progress'           => 0,
            'finish'             => 0,
            'update'             => 1,
            'qtd_update'         => $collective->qtd_update + 1,
            'type_process'       => $data['type_process'],
        ]);
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
