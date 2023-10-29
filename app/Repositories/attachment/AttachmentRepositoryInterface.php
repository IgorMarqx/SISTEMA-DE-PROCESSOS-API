<?php

namespace App\Repositories\attachment;

use App\Models\Attachment;

interface AttachmentRepositoryInterface
{
    public function uploadAttachment($data, $receivedFile): Attachment;
    public function deleteAttachment(Attachment $attachment): bool|null;
    public function getAttachmentId($id): Attachment|null;
    public function getAllAttachmentByProcessId($id);
}
