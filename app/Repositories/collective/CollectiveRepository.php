<?php

namespace App\Repositories\collective;

use App\Models\Collective;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectiveRepository implements CollectiveRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Collective::paginate(5);
    }

    public function createCollective($data): Collective
    {
        return Collective::create([
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
            'progress'           => 1,
        ]);
    }

    public function getCollectiveById($id): bool|Collective
    {
        return Collective::find($id);
    }

    public function updateCollective($data)
    {
        // TODO: Implement updateCollective() method.
    }

    public function finishedCollective(Collective $collective, $data): bool
    {
        return $collective->update($data);
    }

    public function deleteCollective()
    {
        // TODO: Implement deleteCollective() method.
    }

    public function filterCollective($data)
    {
        // TODO: Implement filterCollective() method.
    }
}
