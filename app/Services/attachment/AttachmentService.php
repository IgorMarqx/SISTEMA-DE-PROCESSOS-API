<?php

namespace App\Services\attachment;

use App\Repositories\attachment\AttachmentRepositoryInterface;

class AttachmentService
{
    private AttachmentRepositoryInterface $attachmentRepository;

    public function __construct(AttachmentRepositoryInterface $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }

    public function uploadAttachment($request, $receivedFile)
    {
        $file = $this->attachmentRepository->uploadAttachment($request, $receivedFile);

        $receivedFile->storeAs('public/attachments', $receivedFile->getClientOriginalName());

        return $file;
    }

}
