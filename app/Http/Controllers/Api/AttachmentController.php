<?php

namespace App\Http\Controllers\Api;

use App\Crud\CrudActions;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttachmentStoreRequest;
use App\Http\Requests\AttachmentUpdateRequest;
use App\Http\Resources\AttachmentResource;
use App\Models\Attachment;

class AttachmentController extends Controller
{
    use CrudActions;

    public function __construct()
    {
        $this->setCrudActions(
            Attachment::class,
            AttachmentStoreRequest::class,
            AttachmentUpdateRequest::class,
            AttachmentResource::class
        );
    }
}
