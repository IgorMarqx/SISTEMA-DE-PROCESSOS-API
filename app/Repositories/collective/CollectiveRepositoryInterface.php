<?php

namespace App\Repositories\collective;

interface CollectiveRepositoryInterface
{
    public function getAll();
    public function getCollectiveById($id);
    public function createCollective($data);
    public function updateCollective($data);
    public function deleteCollective();
    public function filterCollective($data);
}
