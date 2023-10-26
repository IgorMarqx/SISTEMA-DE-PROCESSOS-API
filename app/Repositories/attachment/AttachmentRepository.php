<?php

namespace App\Repositories\attachment;

use App\Models\Attachment;

class AttachmentRepository implements AttachmentRepositoryInterface
{
    public function uploadAttachment($data, $receivedFile)
    {
        return Attachment::create([
            'title' => $receivedFile->getClientOriginalName(),
            'process_id' => $data->process_id,
            'user_id' => $data->user_id,
            'type_process' => $data->type_process,
            'path' => $receivedFile->path(),
            'type' => $receivedFile->getClientOriginalExtension(),
            'size' => $receivedFile->getSize(),
        ]);
    }

    public function deleteAttachment($id)
    {
    }

    public function downloadAttachment($id)
    {
    }

    public function getAttachment()
    {
    }
}
