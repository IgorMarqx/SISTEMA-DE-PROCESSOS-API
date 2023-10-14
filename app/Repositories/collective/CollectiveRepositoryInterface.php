<?php

namespace App\Repositories\collective;

use App\Models\Collective;
use Illuminate\Pagination\LengthAwarePaginator;

interface CollectiveRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function createCollective($data): bool|Collective;

    public function getCollectiveById($id): Collective|null;

    public function updateCollective($data);

    public function finishedCollective(Collective $collective, $data);

    public function deleteCollective(Collective $collective): bool|null;

    public function filterCollective($data): bool|LengthAwarePaginator;
}
