<?php

namespace App\Services\attachment;

use App\Models\Attachment;
use App\Repositories\attachment\AttachmentRepositoryInterface;

class AttachmentService
{
    private AttachmentRepositoryInterface $attachmentRepository;

    public function __construct(AttachmentRepositoryInterface $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    public function uploadAttachment($request, $receivedFile): Attachment
    {
        return $this->attachmentRepository->uploadAttachment($request, $receivedFile);
        //        $receivedFile->storeAs('public/attachments', $receivedFile->getClientOriginalName());
    }

    public function getAttachmentId($id): Attachment|null
    {
        return $this->attachmentRepository->getAttachmentId($id);
    }

    public function deleteAttachment($id): bool
    {
        $attachment = $this->attachmentRepository->getAttachmentId($id);

        if(!$attachment) {
            return false;
        }

        return $this->attachmentRepository->deleteAttachment($attachment);
    }

    public function getAllAttachmentByProcessId($id)
    {
        return $this->attachmentRepository->getAllAttachmentByProcessId($id);
    }

}
