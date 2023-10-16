<?php

namespace App\Repositories\process;

use App\Models\Process;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProcessRepository implements ProcessRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Process::paginate(5);
    }

    public function createCollective($data): Process
    {
        return Process::create([
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
            'type_process'       => $data['type_process'],
        ]);
    }

    public function getCollectiveById($id): Process|null
    {
        return Process::find($id);
    }

    public function updateCollective(Process $collective, $data): bool|Collection
    {
        return $collective->update($data);
    }

    public function finishedCollective(Process $collective, $data): bool
    {
        return $collective->update($data);
    }

    public function deleteCollective(Process $collective): bool|null
    {
        return $collective->delete();
    }

    public function filterCollective($data): bool|LengthAwarePaginator
    {
        return Process::where('id', 'like', "%$data->collectiveFilter%")
            ->orWhere('name', 'like', "%$data->collectiveFilter%")
            ->orWhere('jurisdiction', 'like', "%$data->collectiveFilter%")
            ->orWhere('cause_value', 'like', "%$data->collectiveFilter%")
            ->orWhere('priority', 'like', "%$data->collectiveFilter%")
            ->orWhere('judgmental_organ', 'like', "%$data->collectiveFilter%")
            ->orWhere('email_coorporative', 'like', "%$data->collectiveFilter%")
            ->orWhere('email_client', 'like', "%$data->collectiveFilter%")
            ->orWhere('created_at', 'like', "%$data->collectiveFilter%")
            ->orWhere('updated_at', 'like', "%$data->collectiveFilter%")
            ->paginate(5);
    }
}
