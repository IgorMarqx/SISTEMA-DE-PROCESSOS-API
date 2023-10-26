<?php

namespace App\Repositories\attachment;

interface AttachmentRepositoryInterface
{
    public function uploadAttachment($data, $receivedFile);
    public function deleteAttachment($id);
    public function downloadAttachment($id);
    public function getAttachment();
}
