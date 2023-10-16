<?php

namespace App\Repositories\process;

use App\Models\Process;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProcessRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function createCollective($data): bool|Process;

    public function getCollectiveById($id): Process|null;

    public function updateCollective(Process $collective, $data): bool|Collection;

    public function finishedCollective(Process $collective, $data): bool;

    public function deleteCollective(Process $collective): bool|null;

    public function filterCollective($data): bool|LengthAwarePaginator;
}
