<?php

namespace App\Http\Controllers\api\attachment;

use App\Http\Controllers\Controller;
use App\Http\Requests\attachment\AttachmentRequest;
use App\Http\Resources\GlobalResource;
use App\Services\attachment\AttachmentService;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AttachmentController extends Controller
{
    private AttachmentService $attachmentService;

    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    /**
     * @throws \Exception
     */
    public function uploadAttachment(AttachmentRequest $request): GlobalResource
    {
       $this->attachmentService->uploadAttachment($request, $request->file('file'));

        try {
            return new GlobalResource(['error' => false, 'message' => 'Successfully uploaded attachment'], 201);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function getAttachmentId(string $id): GlobalResource
    {
        $attachment = $this->attachmentService->getAttachmentId($id);

        if(!$attachment){
            return new GlobalResource(['error' => true, 'message' => 'Attachment not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => $attachment], 200);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function deleteAttachment(string $id): GlobalResource
    {
        $attachment = $this->attachmentService->deleteAttachment($id);

        if(!$attachment){
            return new GlobalResource(['error' => true, 'message' => 'Attachment not found'], 404);
        }

        try {
            return new GlobalResource(['error' => false, 'message' => 'Successfully deleted attachment'], 200);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function downloadAttachment(string $id): BinaryFileResponse|GlobalResource
    {
        $attachment = $this->attachmentService->getAttachmentId($id);

        if(!$attachment){
            return new GlobalResource(['error' => true, 'message' => 'Attachment not found'], 404);
        }

        try {
            return response()->download($attachment->path. $attachment->title);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public function getAllAttachmentByProcessId(string $id): GlobalResource
    {
        $attachment = $this->attachmentService->getAllAttachmentByProcessId($id);

        try {
            return new GlobalResource(['error' => false, 'message' => $attachment], 200);
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
