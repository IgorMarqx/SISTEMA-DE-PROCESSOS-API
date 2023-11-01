<?php

namespace App\Repositories\attachment;

use App\Models\Attachment;

class AttachmentRepository implements AttachmentRepositoryInterface
{
    public function uploadAttachment($data, $receivedFile): Attachment
    {
        return Attachment::create([
            'title'        => $receivedFile->getClientOriginalName(),
            'process_id'   => $data->process_id,
            'user_id'      => $data->user_id,
            'type_process' => $data->type_process,
            'path'         => $receivedFile->path(),
            'type'         => $receivedFile->getClientOriginalExtension(),
            'size'         => $receivedFile->getSize(),
        ]);
    }

    public function getAttachmentId($id): Attachment|null
    {
        return Attachment::find($id);
    }

    public function deleteAttachment(Attachment $attachment): bool|null
    {
        return $attachment->delete();
    }

    public function getAllAttachmentByProcessId($id)
    {
        return Attachment::where('process_id', $id)->paginate(5);
    }
}
