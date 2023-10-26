<?php

namespace App\Http\Controllers\api\attachment;

use App\Http\Controllers\Controller;
use App\Http\Requests\attachment\AttachmentRequest;
use App\Services\attachment\AttachmentService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    private AttachmentService $attachmentService;

    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    public function uploadAttachment(AttachmentRequest $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $this->attachmentService->uploadAttachment($request, $file);
        }
    }
}
